<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modelos;

class modelosController extends Controller
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
        
        $modelos = Modelos::all();
        return view("Modelos/index",compact("modelos"));
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
        
        $modelos = Modelos::where("modelo","like","%".$request->criterio."%")
                        ->orderBy("modelo","asc")
                        ->get();

        $table = "";
        foreach ($modelos as $i) {
            $table .= "
                <tr>
                    <td>".$i->modelo."</td>
                    <td><a class='btn btn-danger' id='".$i->id."'>Eliminar</a></td>
                    <td><a class='btn btn-warning edit_modelo' id='".$i->id." edit_modelos'>Modificar</a></td>
                </tr>
            ";
        }

        return $table;    }

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
        
        $request->validate([
            "modelo" => "required"
        ]);
        $modelo = new Modelos([
            "modelo" => $request->get("modelo")
        ]);
        $modelo->save();

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

        $data = Modelos::findOrFail($id);
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
        
        $modelo = Modelos::findOrFail($id);
 
        $modelo->modelo = request('edit_modelo');
 
        $modelo->save();

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
        
        Modelos::find($id)->delete();
        return Redirect("Modelos")->with("message","Registro ".$id." eliminado");
    }

    public function eliminar($id){

        Modelos::findOrFail($id)->delete();

        return response()->json(["success"]);
    }
}
