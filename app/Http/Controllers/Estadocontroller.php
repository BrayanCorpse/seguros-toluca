<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Estados;

class Estadocontroller extends Controller
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
        
        $estados = Estados::all();

        return view("estados/index",compact("estados"))->with('i', (request()->input('page', 1) - 1) * 5);
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
        
        $estados = Estados::where("estado","like","%".$request->criterio."%")
                        ->get();

        $table = "";
        foreach ($estados as $i) {
            $table .= "
                <tr>
                    <td>".$i->estado."</td>
                    <td><a class='btn btn-danger' id='".$i->id."'>Eliminar</a></td>
                    <td><a class='btn btn-warning edit_estado' id='".$i->id."'>Modificar</a></td>
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
        
        $data = Estados::findOrFail($id);
        return response()->json(['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        if (session('admin') == false) {
            toastr () -> warning ('Es necesario loguearse');
            return Redirect("/");
        }
        
        $estado = Estados::findOrFail($id);
 
        $estado->estado = request('edit_estado');
 
        $estado->save();
        
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
        
        Estados::find($id)->delete();

        return Redirect("/Estados")->with("message","Registro ".$id." eliminado");
    }

    public function eliminar($id){

        Estados::findOrFail($id)->delete();

        return response()->json(["success"]);
    }
}
