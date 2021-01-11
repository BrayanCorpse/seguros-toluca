<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource("/","principalController");
Route::get("modelos_cotizador","principalController@modelos_cotizador")->name('modelos_cotizador');
Route::get("submarcas_cotizador","principalController@submarcas_cotizador")->name('submarcas_cotizador');

Route::resource("banner","controllerBanner");
Route::GET("showBanner/{id}","controllerBanner@show")->name('showBanner');
Route::GET("deleteBanner/{id}","controllerBanner@deleteBanner")->name('deleteBanner');
Route::GET("datosBanner","controllerBanner@datosBanner")->name('datosBanner');
Route::POST("dataTableBanner","controllerBanner@dataTableBanner")->name('dataTableBanner');
Route::POST("updateBanner","controllerBanner@updateBanner")->name('updateBanner');

Route::resource('ficheros','controllerFile');
Route::POST('directorio','controllerFile@directorio')->name('directorio');
Route::GET('deleteFichero/{id}','controllerFile@deleteFichero')->name('deleteFichero');
Route::GET('carpetas/{id}','controllerFile@carpetas')->name('carpetas');
Route::GET('carpetas/{id}/create','controllerFile@dataCarpeta')->name('dataCarpeta');
Route::GET('deleteFile/{id}','controllerFile@deleteFile')->name('deleteFile');

Route::get("modulo","principalController@create")->name("modulo");

Route::get("cotizador","principalController@cotizador")->name("cotizador");

Route::POST("cotizadores","mailController@cotizadores")->name("cotizadores");

Route::get("modelo","principalController@modelo")->name("modelo");

Route::get("datos","principalController@datos")->name("datos");

Route::get("reporte","principalController@reporte")->name("reporte");

Route::get("datosReporte","principalController@datosReporte")->name("datosReporte");

Route::get("submarca","principalController@submarca")->name("submarca");

Route::get("descripcion","principalController@descripcion")->name("descripcion");

Route::get("detalle","principalController@detalle")->name("detalle");

Route::resource("Estados","Estadocontroller");
//Eliminar
Route::get("delete_estado/{id}","EstadoController@eliminar")->name('delete_estado');

Route::get("sistema","principalController@sistema")->name('sistema');
Route::get("details_ventas/{id}","principalController@details_ventas")->name('details_ventas');

Route::resource("Marcas","marcasController");
//Eliminar
Route::get("delete_mark/{id}","marcasController@eliminar")->name('delete_mark');

Route::resource("Modelos","modelosController");
//Eliminar
Route::get("delete_model/{id}","modelosController@eliminar")->name('delete_model');

Route::resource("Municipios","municipioController");
//Eliminar
Route::get("delete_mun/{id}","municipioController@eliminar")->name('delete_mun');

Route::resource("Clientes","clientesController");
//Eliminar
Route::get("delete_cli/{id}","clientesController@eliminar")->name('delete_cli');

Route::resource("Polizas","polizasController");
//Eliminar
Route::get("delete_poliza/{id}","polizasController@eliminar")->name('delete_poliza');

Route::resource("Aseguradoras","aseguradorasController");
//Eliminar
Route::get("delete_aseg/{id}","aseguradorasController@eliminar")->name('delete_aseg');

Route::resource("Autos","autosController");
//Eliminar
Route::get("delete_car/{id}","autosController@eliminar")->name('delete_car');

Route::resource("Submarcas","submarcasController");
//Eliminar
Route::get("delete_sub/{id}","submarcasController@eliminar")->name('delete_sub');

Route::resource("Descripciones","descripcionesController");
//Eliminar
Route::get("delete_desc/{id}","descripcionesController@eliminar")->name('delete_desc');

Route::resource("Detalles","detalleController");
//Eliminar
Route::get("delete_det/{id}","detalleController@eliminar")->name('delete_det');

Route::resource("login","loginController");

Route::get("iniciar","loginController@iniciar")->name("iniciar");
Route::get("salir","loginController@logout")->name("salir");
Route::get("registrar","loginController@create")->name("registrar");
Route::get("registerUser","loginController@registrar")->name("registerUser");

Route::resource("contacto","mailController");
//Eliminar
Route::get("delete_co/{id}","mailController@eliminar")->name('delete_co');

#Paypal
Route::bind('addItem',function($id){
	return App\Productos::where('id','=',$id)->first();
});
Route::get('catalogo','controllerDataPaypal@index')->name('catalogo');
Route::get('addItem/{id}','controllerDataPaypal@store')->name('addItem');
Route::get('carrito','controllerDataPaypal@create')->name('carrito');
Route::get('deleteItem/{id}','controllerDataPaypal@deleteItem')->name('deleteItem');
Route::get('updateItem/{id}/{quantity}','controllerDataPaypal@update')->name('updateItem');
Route::get('datos_carrito','controllerDataPaypal@datos_carrito')->name('datos_carrito');
Route::get('mis_compras','controllerDataPaypal@mis_compras')->name('mis_compras');
Route::get('detalle_compra/{id}','controllerDataPaypal@detalle_compra')->name('detalle_compra');

Route::get('payment', array(
	'as' => 'payment',
	'uses' => 'paypalController@postPayment',
));

Route::get('payment/status', array(
	'as' => 'payment.status',
	'uses' => 'paypalController@getPaymentStatus',
));
#Paypal


