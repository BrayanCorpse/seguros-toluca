<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estados;
use App\Marcas;
use App\Modelos;
use App\Submarcas;
use App\Descripciones;
use App\Detalles;
use App\Modulo;
use App\Autos;
use DB;
use App\Ventas;
use App\Items;

class principalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estados::all();
        $marcas = Marcas::all();
        $modelos = Modelos::all();
        $submarca = Submarcas::all();
        $descripciones= Descripciones::all();
        $detalles= Detalles::all();
        $rectangle = DB::SELECT('SELECT * FROM banner WHERE id_formato=1');
        $square = DB::SELECT('SELECT * FROM banner WHERE id_formato=2');
        $splitscreen  = DB::SELECT('SELECT * FROM banner WHERE id_formato=3');
        $banner = DB::SELECT('SELECT * FROM banner WHERE id_formato=4');
        $half1 = DB::SELECT('SELECT * FROM banner WHERE id_formato=5');
        $half2 = DB::SELECT('SELECT * FROM banner WHERE id_formato=6');
        $mega1 = DB::SELECT('SELECT * FROM banner WHERE id_formato=7');
        $mega2 = DB::SELECT('SELECT * FROM banner WHERE id_formato=8');
        $Skyscraper = DB::SELECT('SELECT * FROM banner WHERE id_formato=9');
        return view("index",compact("estados","marcas","modelos","submarca","descripciones","detalles","rectangle","square","splitscreen","banner","half1","half2","mega1","mega2","Skyscraper"));
    }

    public function sistema()
    {
        if (session('admin') == false) {
            toastr () -> warning ('Es necesario loguearse');
            return Redirect("/");
        }
        $ventas = DB::select("SELECT v.id,TIME(v.fecha) AS hora, DATE(v.`fecha`) AS fecha,v.`total`,v.`productos`,CONCAT(s.`user`,' ',s.`paterno`,' ',s.`paterno`) AS user
        FROM ventas AS v
        INNER JOIN users AS s ON s.`id`=v.`id_user`");
        return view("Panel.index",compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $marcas = Marcas::all()->pluck('marca', 'id');
        return view("Modulo/modulo",compact("marcas"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
    public function cotizador(Request $request){
        $cotizador = new Modulo;

        $cotizador->create($request->all());

        return Response()->json(["success"]);
    }

    public function modelo(Request $request){
        $modelos = DB::select("SELECT DISTINCT m.`id`,m.`modelo` FROM modelos AS m INNER JOIN autos AS a
                    ON m.`id`=a.`id_modelo`
                    WHERE id_marca = ".$request->valor."");
        $option = "";
        foreach ($modelos as $i) {
            $option .= "
                <option value='".$i->id."'>".$i->modelo."</option>
            ";
        }
        return $option;
    }
    public function submarca(Request $request){
        $submarca = DB::select("SELECT DISTINCT s.`id`,s.`submarca` FROM submarcas AS s INNER JOIN autos AS a
                        ON s.`id`=a.`id_submarca`
                        WHERE id_modelo = $request->modelo AND id_marca = $request->marca");
        $option = "";
        foreach ($submarca as $i) {
            $option .= "
                <option value='".$i->id."'>".$i->submarca."</option>
            ";
        }
        return $option;
    }
    public function descripcion(Request $request){
        $descripcion = DB::select("SELECT DISTINCT d.`id`,d.`descripcion` FROM descripciones AS d INNER JOIN autos AS a
            ON d.`id`=a.`id_descripcion`
            WHERE id_modelo = $request->modelo AND id_marca = $request->marca AND id_submarca = $request->submarca");
        $option = "";
        foreach ($descripcion as $i) {
            $option .= "
                <option value='".$i->id."'>".$i->descripcion."</option>
            ";
        }
        return $option;
    }
    public function detalle(Request $request){
        $detalle = DB::select("SELECT DISTINCT d.`id`,d.`detalle` FROM detalles_autos AS d INNER JOIN autos AS a
            ON d.`id`=a.`id_detalle`
            WHERE id_modelo = $request->modelo AND id_marca = $request->marca AND id_submarca = $request->submarca AND id_descripcion = $request->descripcion");
        $option = "";
        foreach ($detalle as $i) {
            $option .= "
                <option value='".$i->id."'>".$i->detalle."</option>
            ";
        }
        return $option;
    }
    public function datos(Request $request){
        $monto = DB::select("SELECT * FROM autos
        WHERE id_modelo = $request->modelo AND id_marca = $request->marca AND id_submarca = $request->submarca AND id_descripcion = $request->descripcion AND id_detalle = $request->detalle");
        return $monto[0]->monto;
    }

    public function reporte(Request $request){
        $estados = Estados::all()->pluck('estado', 'id');
        $marcas = Marcas::all()->pluck('marca', 'id');
        $modelos = Modelos::all()->pluck('modelo', 'id');
        $submarca = Submarcas::all()->pluck('submarca', 'id');
        $descripciones= Descripciones::all()->pluck("descripcion","id");
        $detalles= Detalles::all()->pluck("detalle","id");
        return view("Modulo/reporte",compact("estados","marcas","modelos","submarca","descripciones","detalles"));
    }

    public function datosReporte(Request $request){
        $datos = DB::select("SELECT ma.`marca`,mo.`modelo`,su.`submarca`,de.`descripcion`,det.`detalle`,m.`genero`,m.`nombre`,m.`edad`,m.`correo`,m.`telefono`,
            m.`cobertura`,m.`monto`,m.`forma_pago`,m.`cuota`,m.`mensualidad`,m.`total`
            FROM modulo AS m,marcas AS ma,modelos AS mo,submarcas AS su,descripciones AS de,detalles_autos AS det
            WHERE m.`marca`=ma.`id`
            AND m.`modelo`=mo.`id`
            AND m.`submarca`=su.`id`
            AND m.`descripcion`=de.`id`
            AND m.`detalle`=det.`id`
            AND m.`id` = $request->folio");

        return response()->json(['data'=>$datos]);
    }

    public function modelos_cotizador(Request $request){
        $id = $request->marca;
        $query = DB::SELECT("SELECT DISTINCT a.id_modelo,m.modelo
        FROM  autos AS a
        INNER JOIN modelos AS m ON m.id=a.id_modelo
        WHERE id_marca = ".$id."");
        return Response()->json(['modelo'=>$query]);
    }

    public function submarcas_cotizador(Request $request){
        $marca = $request->marca;
        $modelo = $request->modelo;
        $query = DB::SELECT("SELECT DISTINCT a.id_submarca,s.submarca
        FROM  autos AS a
        INNER JOIN submarcas AS s ON s.id=a.id_submarca
        WHERE id_marca = ".$marca."
        AND id_modelo = ".$modelo."");
        return Response()->json(['submarca'=>$query]);
    }

    public function details_ventas($id){
        $items = DB::SELECT("SELECT i.`id`,DATE(i.`fecha`) AS fecha,TIME(i.`fecha`) AS hora,i.`cantidad`,i.`precio`,i.`subtotal`
        FROM items AS i
        WHERE i.`id_venta` =$id");
        return view('Panel.details',compact('items'));
    }
}
