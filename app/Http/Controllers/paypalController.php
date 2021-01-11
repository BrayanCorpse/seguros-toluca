<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

use App\Items as it;
use App\Ventas;
use App\Productos as pr;

class paypalController extends Controller
{
    private $_api_context;
 
	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = \Config::get('Paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}
 
	public function postPayment()
	{
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');
 
		$items = array();
		$subtotal = 0;
		$cart = \Session::get('cart');
		$currency = 'MXN';
 
		foreach($cart as $producto){
			$item = new Item();
			$item->setName($producto->nombre)
			->setCurrency($currency)
			->setDescription($producto->marca)
			->setQuantity($producto->quantity)
			->setPrice($producto->costo);
 
			$items[] = $item;
			$subtotal += $producto->subtotal;
		}
 
		$item_list = new ItemList();
		$item_list->setItems($items);
 
		$details = new Details();
		$details->setSubtotal($subtotal)
		->setShipping(0);//precio de envio
 
		$total = $subtotal;//sumar el precio de envio
 
		$amount = new Amount();
		$amount->setCurrency($currency)
			->setTotal($total)
			->setDetails($details);
 
		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription('Pedido de prueba en mi Laravel App Store');
 
		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			->setCancelUrl(\URL::route('payment.status'));
 
		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));

			#return $cart;
 
		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Ups! Algo salió mal');
			}
		}
 
		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}
 
		// add payment ID to session
		\Session::put('paypal_payment_id', $payment->getId());
 
		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url);
		}
 
		return \Redirect::route('cart-show')
			->with('message', 'Ups! Error desconocido.');
 
	}
 
	public function getPaymentStatus(Request $request)
	{
		// Get the payment ID before session clear
		$payment_id = \Session::get('paypal_payment_id');
 
		// clear the session payment ID
		\Session::forget('paypal_payment_id');
 
		$payerId = $request->PayerID;
        $token = $request->token;
 
		if (empty($payerId) || empty($token)) {
			\Session::flash('danger','Hubo un problema al intentar pagar con Paypal');
			return \Redirect::route('mis_compras');
		}
 
		$payment = Payment::get($payment_id, $this->_api_context);
 
		$execution = new PaymentExecution();
		$execution->setPayerId($payerId);
 
		$result = $payment->execute($execution, $this->_api_context);
 
 
		if ($result->getState() == 'approved') {
 
			$this->saveOrder();
 
			\Session::forget('cart');
 			\Session::flash('success','Compra realizada de forma correcta');
			return \Redirect::route('mis_compras');
		}
		\Session::flash('warning','La compra fue cancelada');
		return \Redirect::route('mis_compras');
	}
 
	protected function saveOrder()
	{
		$subtotal = 0;
		$cart = \Session::get('cart');
		$user = \Session::get('user');
		$shipping = 100;
 
		foreach($cart as $producto){
			$subtotal += $producto->subtotal;
		}

		$date = date('Y-m-d H:i:s');
 
		$order = Ventas::create([
			'fecha' => date("Y-m-d H:i:s", strtotime( $date." - 5 hour")),
			'id_user' => $user[0]->id,
			'total' => $subtotal,
            'productos' => count($cart)
		]);
 
		foreach($cart as $producto){
			$this->saveOrderItem($producto, $order->id);
		}
	}
 
	protected function saveOrderItem($producto, $order_id)
	{
		$date = date('Y-m-d H:i:s');
		it::create([
			'fecha' => date("Y-m-d H:i:s", strtotime( $date." - 5 hour")),
			'cantidad' => $producto->quantity, 
			'precio' => $producto->costo, 
			'subtotal' => $producto->subtotal, 
			'id_venta' => $order_id,
			'id_producto' => $producto->id
		]);

		$p = pr::findOrFail($producto->id);
		$p->existencia = $p->existencia - $producto->quantity;
		$p->save();
	}
}
