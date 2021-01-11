<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Autos;

use App\Marcas;

use App\Modelos;

use App\Descripciones;

use App\Detalles;

use App\Submarcas;

use DB;

use Redirect;

class autosController extends Controller
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

        $autos = Autos::all();
        $marcas = Marcas::all()->pluck('marca','id');
        $modelos = Modelos::all()->pluck('modelo','id');
        $descripciones = Descripciones::all()->pluck('descripcion','id');
        $detalles = Detalles::all()->pluck('detalle','id');
        $submarcas = Submarcas::all()->pluck('submarca','id');

        return view("Autos/index",compact("autos","marcas","modelos","descripciones","detalles","submarcas"));
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

        $autos = DB::table("autos as a")
        ->join("marcas as m","a.id_marca","m.id")
        ->join("modelos as mo","a.id_modelo","mo.id")
        ->join("submarcas as su","a.id_submarca","su.id")
        ->join("descripciones as de","a.id_descripcion","de.id")
        ->join("detalles_autos as det","a.id_detalle","det.id")
        ->where("m.marca","like","%".$request->criterio."%")
        ->orWhere("mo.modelo","like","%".$request->criterio."%")
        ->orWhere("su.submarca","like","%".$request->criterio."%")
        ->orWhere("de.descripcion","like","%".$request->criterio."%")
        ->orWhere("det.detalle","like","%".$request->criterio."%")
        ->get();

        $table = "";
        foreach ($autos as $i) {
            $table .= "
                <tr>
                    <td>".$i->marca."</td>
                    <td>".$i->modelo."</td>
                    <td>".$i->submarca."</td>
                    <td>".$i->detalle."</td>
                    <td>".$i->descripcion."</td>
                    <td>".$i->monto."</td>
                    <td><a class='btn btn-danger' id='".$i->id."'>Eliminar</a></td>
                    <td><a class='btn btn-warning edit_auto' id='".$i->id."'>Modificar</a></td>
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

        $auto = new Autos;

        $auto->create($request->all());

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
        
        $data = Autos::findOrFail($id);
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
        
        $autos = Autos::findOrFail($id);
 
        $autos->id_marca = request('edit_id_marca');

        $autos->id_modelo = request('edit_id_modelo');

        $autos->id_submarca = request('edit_id_submarca');

        $autos->id_detalle = request('edit_id_detalle');

        $autos->id_descripcion = request('edit_id_descripcion');

        $autos->monto = request('edit_monto');
 
        $autos->save();
        
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
        
        Autos::find($id)->delete();

        return Redirect("/Autos")->with("message","Registro ".$id." eliminado");
    }

    public function eliminar($id){

        Autos::findOrFail($id)->delete();

        return response()->json(["success"]);
    }
}
