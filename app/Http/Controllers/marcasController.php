<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Marcas;

use Redirect;

class marcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (session('admin') == false) {
            toastr () -> warning ('Es necesario loguearse');
            return Redirect("/");
        }
        $marcas = Marcas::paginate(5);
        if ($request->ajax()) {
            return view("marcas.index",compact("marcas"));  
        }
        return view("marcas.index",compact("marcas"));
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

        //$marcas = Marcas::all();return view("marcas/newmark",compact("marcas"));

        $marcas = Marcas::where("marca","like","%".$request->criterio."%")
                        ->get();

        $table = "";
        foreach ($marcas as $i) {
            $table .= "
                <tr>
                    <td>".$i->marca."</td>
                    <td><a class='btn btn-danger' id='".$i->id."'>Eliminar</a></td>
                    <td><a class='btn btn-warning edit_marca' id='".$i->id."'>Modificar</a></td>
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
        
        $marca = new Marcas;

        $marca->create($request->all());

        return response()->json("success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $marcas = Marcas::paginate(5);
        return view("marcas.newmark",compact("marcas"));
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
        
        $data = Marcas::findOrFail($id);
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
        
        $marca = Marcas::findOrFail($id);
 
        $marca->marca = request('edit_marca');
 
        $marca->save();

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
        
        //Marcas::find($id)->delete();
        return response()->json(["Registro eliminado"]);
        //return Redirect("Marcas")->with("message","Registro ".$id." eliminado");
    }

    public function eliminar($id){

        Marcas::findOrFail($id)->delete();

        return response()->json(["success"]);
    }
}
