<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Municipios;

use App\Clientes;

use App\Estados;

class clientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('admin') == false) {
            toastr () -> warning ('Es necesario loguearse');
            return Redirect("/");
        }

        $clientes = Clientes::all();
        $municipios = Municipios::all()->pluck('municipio','id');
        $estados = Estados::all()->pluck('estado','id');

        return view("clientes.index",compact("clientes","municipios","estados"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (session('admin') == false) {
            toastr () -> warning ('Es necesario loguearse');
            return Redirect("/");
        }

        $clientes = Clientes::where("nombre","like","%".$request->criterio."%")
                        ->orWhere("ap_paterno","like","%".$request->criterio."%")
                        ->orWhere("ap_materno","like","%".$request->criterio."%")
                        ->orWhere("genero","like","%".$request->criterio."%")
                        ->orWhere("edad","like","%".$request->criterio."%")
                        ->orWhere("telefono","like","%".$request->criterio."%")
                        ->orWhere("correo","like","%".$request->criterio."%")
                        ->orWhere("calle","like","%".$request->criterio."%")
                        ->get();

        $table = "";
        foreach ($clientes as $i) {
            $table .= "
                <tr>
                    <td>".$i->nombre." ".$i->ap_paterno." ".$i->ap_materno."</td>
                    <td>".$i->genero."</td>
                    <td>".$i->edad."</td>
                    <td>".$i->telefono."</td>
                    <td>".$i->correo."</td>
                    <td>".$i->estados->estado."</td>
                    <td>".$i->municipios->municipio."</td>
                    <td>".$i->calle."</td>
                    <td>".$i->no_int."</td>
                    <td>".$i->no_ext."</td>
                    <td>".$i->c_p."</td>
                    <td><a class='btn btn-danger' id='".$i->id."'>Eliminar</a></td>
                    <td><a class='btn btn-warning edit_cli' id='".$i->id."'>Modificar</a></td>
                </tr>
            ";
        }

        return $table;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (session('admin') == false) {
            toastr () -> warning ('Es necesario loguearse');
            return Redirect("/");
        }
        
        $cliente = new Clientes;

        $cliente->create($request->all());

        return response()->json("success");
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
        if (session('admin') == false) {
            toastr () -> warning ('Es necesario loguearse');
            return Redirect("/");
        }

        $data = Clientes::findOrFail($id);
        return response()->json(['data'=> $data]);
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
        if (session('admin') == false) {
            toastr () -> warning ('Es necesario loguearse');
            return Redirect("/");
        }

        $cliente = Clientes::findOrFail($id);
 
        $cliente->nombre = request('edit_nombre');
        $cliente->ap_paterno = request('edit_ap_paterno');
        $cliente->ap_materno = request('edit_ap_materno');
        $cliente->genero = request('edit_genero');
        $cliente->edad = request('edit_edad');
        $cliente->telefono = request('edit_telefono');
        $cliente->correo = request('edit_correo');
        $cliente->id_municipio = request('edit_id_municipio');
        $cliente->calle = request('edit_calle');
        $cliente->no_int = request('edit_no_int');
        $cliente->no_ext = request('edit_no_ext');
        $cliente->c_p = request('edit_c_p');
        $cliente->id_estado = request('edit_id_estado');
 
        $cliente->save();
        
        return response()->json(["success"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (session('admin') == false) {
            toastr () -> warning ('Es necesario loguearse');
            return Redirect("/");
        }
        
        Clientes::find($id)->delete();

        return Redirect("/Clientes");
    }

    public function eliminar($id){

        Clientes::findOrFail($id)->delete();

        return response()->json(["success"]);
    }
}
