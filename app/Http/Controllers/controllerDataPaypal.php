<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos as pr;
use DB;

class controllerDataPaypal extends Controller
{
    public function __construct(){
        if(!\Session::has('cart')) \Session::put('cart',array());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = pr::all();
        return view('paypalViews.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = \Session::get('cart');
        $total = $this->total();
        return view('paypalViews.carrito',compact('items','total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(pr $id)
    {
        $cart = \Session::get('cart');
        $id->quantity = 1;
        $id->subtotal = $id->costo;
        $cart[$id->id] = $id;
        \Session::put('cart',$cart);
        return Response()->json($this->count());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(pr $id,$quantity)
    {
        $cart = \Session::get('cart');
        $cart[$id->id]->quantity = $quantity;
        $cart[$id->id]->subtotal = $quantity*$cart[$id->id]->costo;
        \Session::put('cart',$cart);
        toastr()->success('producto actualizado!');
        return Redirect()->route('carrito');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteItem(pr $id)
    {
        $cart = \Session::get('cart');
        unset($cart[$id->id]);
        \Session::put('cart',$cart);
        toastr()->success('producto eliminado!');
        return Redirect()->route('carrito');
    }

    public function count(){
        $valor = \Session::get('cart');
        return count($valor);
    }

    public function total(){
        $cart = \Session::get('cart');
        $total = 0;
        foreach ($cart as $i) {
            $total += $i->subtotal;
        }
        return $total;
    }

    public function datos_carrito(){
        if (empty(\Session::has('user'))) {
            toastr()->warning('es necesario iniciar sesión!');
            return Redirect("/login");
        }
        $user = \Session::get('user');
        $cart = \Session::get('cart');
        $total = $this->total();
        return view('paypalViews.datos_carrito',compact('cart','total','user'));
    }

    public function mis_compras(){
        $user = \Session::get('user');
        $ventas = DB::SELECT("SELECT v.id,TIME(v.fecha) AS hora, DATE(v.`fecha`) AS fecha,v.`total`,v.`productos`
        FROM ventas AS v
        WHERE v.`id_user` = ".$user[0]->id."");
        return view('paypalViews.mis_compras',compact('ventas'));
    }

    public function detalle_compra($id){
        $items = DB::SELECT("SELECT i.`id`,DATE(i.`fecha`) AS fecha,TIME(i.`fecha`) AS hora,i.`cantidad`,i.`precio`,i.`subtotal`
        FROM items AS i
        WHERE i.`id_venta` =$id");
        return view('paypalViews.detalle_compra',compact('items'));
    }
}
