<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Aseguradoras;

use Redirect;

class aseguradorasController extends Controller
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

        $seguros = Aseguradoras::all();

        return view("Aseguradoras/index",compact("seguros"));
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
        //Obtenemos la variable enviada por ajax y realizamos la busqueda por criterio
        $aseguradoras = Aseguradoras::where("aseguradora","like","%".$request->criterio."%")
                        ->get();
        //creamos una variable para concatenaar las filas de la tabla
        $table = "";
        //recorremos la variable como $i
        foreach ($aseguradoras as $i) {
            //concatenamos fila por fila
            $table .= "
                <tr>
                    <td>".$i->aseguradora."</td>
                    <td><a class='btn btn-danger' id='".$i->id."'>Eliminar</a></td>
                    <td><a class='btn btn-warning edit_aseguradora' id='".$i->id."'>Modificar</a></td>
                </tr>
            ";
        }
        //retornamos la fila en la variable $table
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

        $aseguradora = new Aseguradoras;

        $aseguradora->create($request->all());

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
        
        $data = Aseguradoras::findOrFail($id);
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
        
        $seguro = Aseguradoras::findOrFail($id);
 
        $seguro->aseguradora = request('edit_aseguradora');
 
        $seguro->save();
        
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
        
        Aseguradoras::find($id)->delete();
        return Redirect("/Aseguradoras")->with("message","Registro ".$id." eliminado");
    }

    public function eliminar($id){

        Aseguradoras::findOrFail($id)->delete();

        return response()->json(["success"]);
    }
}
