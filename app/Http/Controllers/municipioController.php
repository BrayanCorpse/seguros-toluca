<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Municipios;

use App\Estados;

class municipioController extends Controller
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
        
        $estados = Estados::all()->pluck('estado', 'id');

        return view("municipios.index",compact("estados"));
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
        
        $municipio = Municipios::where("municipio","like","%".$request->criterio."%")
                        ->get();

        $table = "";
        foreach ($municipio as $i) {
            $table .= "
                <tr>
                    <td>".$i->municipio."</td>
                    <td>".$i->estados->estado."</td>
                    <td><a class='btn btn-danger' id='".$i->id."'>Eliminar</a></td>
                    <td><a class='btn btn-warning edit_municipio' id='".$i->id."'>Modificar</a></td>
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
        
        $estado = new Estados;

        $estado->create($request->all());

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
        
        //$municipio = Municipios::findOrFail($id);

        //$estado = Estados::all()->sortBy('estado', SORT_NATURAL | SORT_FLAG_CASE)->pluck('estado', 'id');

        $data = Municipios::findOrFail($id);
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
        
        $municipio = Municipios::findOrFail($id);
 
        $municipio->municipio = request('edit_municipio');

        $municipio->id_estado = request('edit_estado');
 
        $municipio->save();
        
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
        
        Municipios::find($id)->delete();
        return Redirect("/Municipios")->with("message","Registro ".$id." eliminado");
    }

    public function eliminar($id){

        Municipios::findOrFail($id)->delete();

        return response()->json(["success"]);
    }
}
