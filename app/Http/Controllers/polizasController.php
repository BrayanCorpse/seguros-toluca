<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Clientes;

use App\Polizas;

use App\Aseguradoras;

class polizasController extends Controller
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
        
        $clientes = Clientes::select(
                            DB::raw("CONCAT(nombre,' ',ap_paterno,' ',ap_materno) as nombre"),"id")
                            ->pluck('nombre', 'id');

        $aseguradoras = Aseguradoras::all()->pluck('aseguradora', 'id');

        $polizas = Polizas::all();

        return view("polizas/index",compact("polizas","clientes","aseguradoras"));
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
        
        $clientes = Clientes::all()->pluck('nombre', 'id');

        $aseguradoras = Aseguradoras::all()->pluck('aseguradora', 'id');

        $polizas = Polizas::where("id","like","%".$request->criterio."%")
                        ->get();

        $table = "";
        foreach ($polizas as $i) {
            $table .= "
                <tr>
                    <td>".$i->poliza."</td>
                    <td>".$i->clientes->nombre." ".$i->clientes->ap_paterno." ".$i->clientes->ap_materno."</td>
                    <td>".$i->aseguradoras->aseguradora."</td>
                    <td>$ ".$i->importe."</td>
                    <td>".$i->moneda."</td>
                    <td>".$i->forma_pago."</td>
                    <td>".$i->fecha_registro."</td>
                    <td>".$i->fecha_vigencia."</td>
                    <td><a class='btn btn-danger' id='".$i->id."'>Eliminar</a></td>
                    <td><a class='btn btn-warning edit_poliza' id='".$i->id."'>Modificar</a></td>
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
        $poliza = new Polizas;

        $poliza->create($request->all());
        
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
        
        $poliza = Polizas::findOrFail($id);

        $cliente = Clientes::all()->sortBy('nombre', SORT_NATURAL | SORT_FLAG_CASE)->pluck('nombre', 'id');

        $data = Polizas::findOrFail($id);
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
        
        $poliza = Polizas::findOrFail($id);
 
        $poliza->poliza = request('po');

        $poliza->fecha_registro = request('fr');

        $poliza->aseguradora = request('as');

        $poliza->importe = request('im');

        $poliza->moneda = request('mo');

        $poliza->forma_pago = request('fp');

        $poliza->id_cli = request('cli');

        $poliza->fecha_vigencia = request('fv');
 
        $poliza->save();
        
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
        
        Polizas::find($id)->delete();

        return Redirect("/Polizas")->with("message","Registro ".$id." eliminado");
    }

    public function eliminar($id){

        Polizas::findOrFail($id)->delete();

        return response()->json(["success"]);
    }
}
