<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Redirect;
use App\Correos;
use App\Cotizador;

class mailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("mail.correos");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $mails = Correos::all();

        $card = "";
        foreach ($mails as $i) {
            $card.="
                <div class='card'>
                    <div class='head-card'>
                    </div>
                    <div class='body-card'>
                        <b>Nombre: </b><p>".$i->nombre."</p>
                        <b>Telefono: </b><p>".$i->telefono."</p>
                        <b>Correo: </b><p>".$i->correo."</p>
                        <b>Mensaje: </b><p>".$i->mensaje."</p>
                    </div>
                    <div class='foot-card'>
                        <button class='btn btn-danger' id='".$i->id."'>Eliminar</button>
                    </div>
                </div>
            ";
        }
        return $card;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cemail = $request["correo"];

        Mail::send('mail.contacto', $request->all(),function ($msj) use($cemail){
            $msj->subject('Correo de contacto');
            $msj->to($cemail);
        });

        Mail::send('mail.contacto', $request->all(),function ($msj){
            $msj->subject('Correo de contacto');
            $msj->to("recuperacion@segurostoluca.com.mx");
        });

        toastr () -> success ( 'Mensaje enviado' );

        $Correo = new Correos;

        $Correo->create($request->all());

        return Redirect("/#contacto");
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function eliminar($id){

        Correos::findOrFail($id)->delete();

        return response()->json(["success"]);
    }

    public function cotizadores(Request $request){

        $cemail = $request->correo;

        Mail::send('mail.cotizadores', $request->all(),function ($msj) use($cemail){
            $msj->subject('Correo de contacto');
            $msj->to($cemail);
        });

        Mail::send('mail.cotizadores', $request->all(),function ($msj){
            $msj->subject('Correo de contacto');
            $msj->to("recuperacion@segurostoluca.com.mx");
        });
        $date = date('Y-m-d H:i:s');
        /*Cotizador::insert([
            'fecha' => date("Y-m-d H:i:s", strtotime( $date." - 5 hour")),
            'nombre' => $request->name,
            'edad' => $request->edad,
            'genero' => $request->genero,
            'correo' => $request->correp,
            'telefono' => $request->telefono,
            'id_marca' => $request->marca,
            'id_modelo' => $request->modelo,
            'id_submarca' => $request->submarca,
            'id_detalle' => $request->detalle,
            'descripcion' => $request->descripcion
        ]);*/

        toastr()->success('Cotización exitosa');

        return Redirect("/");
    }
}
