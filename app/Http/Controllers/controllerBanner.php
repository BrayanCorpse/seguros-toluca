<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class controllerBanner extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formatos = DB::SELECT("SELECT fb.`id`,fb.`Formato`
        FROM formatoBanner AS fb");
        return view("Banners/alntaBanner",compact('formatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banner = DB::SELECT("SELECT fb.`id`,fb.`Formato`,fb.`Descripcion`,fb.`Ancho`,fb.`Alto`,ba.`imagen`,ba.id as ban
        FROM formatoBanner AS fb 
        INNER JOIN banner AS ba ON ba.`id_formato`=fb.`id` ORDER BY ba.id DESC");
        $table = '';
        foreach($banner as $i){
            $table .= "
                <tr>
                <td>".$i->Formato."</td>
                <td>".$i->Descripcion."</td>
                <td>".$i->Ancho."px</td>
                <td>".$i->Alto."px</td>
                <td><img class='dataImage' src='/banners/".$i->imagen."'></td>
                <td><button class='btn btn-warning btnShowBanner' id='".$i->imagen."' data-toggle='modal' data-target='#banner_show'>Mostrar</button> 
                    <button id='".$i->ban."' class='btn btn-danger'>Eliminar</button>
                </td>
                </tr>";
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
        if ($request->hasFile('banner')) {
            $file = $request->banner;
            $filename = $file->getClientOriginalName();
            $id_formato = $request->idFormat;
            $file->move(public_path().'/banners',$filename);
            DB::INSERT("INSERT INTO banner(imagen,id_formato) VALUES('$filename',$id_formato)");
            return Response()->json('success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = DB::SELECT('SELECT fb.`Formato`,b.`imagen`,fb.`Ancho`,fb.`Alto`,b.`id`
        FROM formatoBanner AS fb 
        INNER JOIN  banner AS b ON b.`id_formato`=fb.`id`
        WHERE fb.`id`='.$id.'');
        if (count($banner) > 0) {
            $nameBanner = $banner[0]->Formato;
        }else{   
            $try = DB::SELECT('SELECT fb.`Formato` FROM formatoBanner AS fb WHERE fb.`id`='.$id.'');   
            $banner = 'error';    
            $nameBanner = $try[0]->Formato;
        }
        return  view('Banners/showBanner',compact('banner','nameBanner')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = DB::SELECT('SELECT * FROM banner WHERE id = '.$id.'');
        return Response()->json(['data'=>$banner]);
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
        if ($request->hasFile('banner')) {
            $formato = $request->formato;
            $id = $request->formato;
            $oldName = DB::SELECT('SELECT imagen FROM banner WHERE id = '.$id.'');
            $oldImage = public_path().'/banners'.$oldName[0]->imagen;
            if (@getimagesize($oldImage)) {
                unlink($oldImage);
            }
            //subir nuevo banner
            $banner = $request->banner;
            $filename = $banner->getClientOriginalName();
            $banner->move(public_path().'/banners',$filename);
            //Actualizar la base de datos
            DB::table('banner')->where('id','=',$id)->update([
                'imagen' => $filename,
                'id_formato' => $formato
            ]);
            return Response()->json('success');
        }else{
            /*$id = $request->id;
            $formato = $request->formato;
            //Actualizar la base de datos
            DB::table('banner')->where('id','=',$id)->update([
                'id_formato' => $formato
            ]);
            return Response()->json('success');*/
        }
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

    public function deleteBanner($id){
        $imagen = DB::SELECT("SELECT imagen FROM banner WHERE id = $id");
        $mi_imagen = public_path().'/banners/'.$imagen[0]->imagen.'';
        if (@getimagesize($mi_imagen)) {
            DB::table('banner')->where('id','=',$id)->delete();
            unlink($mi_imagen);
            return Response()->json('success');
        }
    }

    public function datosBanner(Request $request){
        $banner = DB::SELECT('SELECT * FROM formatoBanner WHERE id = '.$request->id.'');
        return Response(['data'=>$banner]);
    }

    public function dataTableBanner(Request $request){
        $data = DB::SELECT("SELECT fb.`Formato`,fb.`Ancho`,fb.`Alto`
        FROM formatoBanner AS fb WHERE id = ".$request->id."");
        return Response()->json(['data'=>$data]);
    }

    public function updateBanner(Request $request){
        if ($request->hasFile('banner')) {
            return Response()->json('success');
        }
    }
}
