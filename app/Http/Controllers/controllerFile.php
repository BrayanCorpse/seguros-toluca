<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class controllerFile extends Controller
{
    public function index(){
    	return view('Fichero/fichero');
    }

    public function create(Request $request){
    	$ficheros = DB::SELECT("SELECT fic.id,fic.nombre,fic.fecha,IF(COUNT(fil.id_fichero)>0,COUNT(fil.id_fichero),0) AS cuantos
        FROM ficheros AS fic
        LEFT JOIN files AS fil ON fil.id_fichero=fic.id GROUP BY fic.id");

         $table = '';
        foreach($ficheros as $i){
            $table .= "
                <tr>
                <td>".$i->nombre."</td>
                <td>".$i->fecha."</td>
                <td>".$i->cuantos."</td>
                <td><a class='btn btn-warning' href='/carpetas/".$i->id."'>Abrir</a>
                    <button id='".$i->id."' class='btn btn-danger'>Eliminar</button>
                    <button id='".$i->id."' class='btn btn-success edit_Fichero'>Editar</button>
                </td>
                </tr>";
        }
        return $table;
    }

    public function edit($id)
    {
        $fichero = DB::SELECT('SELECT * FROM ficheros WHERE id = '.$id.'');
        return Response()->json(['data'=>$fichero]);
    }

    public function show(){

    }

    public function store(Request $request){
    	if ($request->hasFile('file')) {
            $file = $request->file;
            $fichero = $request->fichero;
            $filename = $file->getClientOriginalName();
            $filesize = filesize($file);
            $file->move(public_path().'/fichero',$filename);
            DB::INSERT('INSERT INTO files(nombre,size,fecha,id_fichero) VALUES("'.$filename.'","'.$filesize.'",CURRENT_DATE(),'.$fichero.')');
            return Response()->json('success');
        }
    }

    public function carpetas($id){
        $nombre = DB::SELECT('SELECT nombre FROM ficheros WHERE id = '.$id.'');
        $nombre = $nombre[0]->nombre;
        $fichero = $id;
        return view('Fichero/carpeta',compact('nombre','fichero'));
    }

    public function update(Request $request,$id){
        DB::table('ficheros')->where('id','=',$id)->update([
            'nombre'=>$request->newName
        ]);
        return Response()->json('success');
    }

    public function directorio(Request $request){
        $fichero = $request->fichero;
    	DB::INSERT("INSERT INTO ficheros(nombre,fecha) VALUES('$fichero',CURRENT_DATE())");
    	return response()->json('success');
    }

    public function deleteFichero($id){
        DB::table('ficheros')->where('id','=',$id)->delete();
        return Response()->json('success');
    }

    public function dataCarpeta($id){
        $files = DB::SELECT('SELECT * FROM  files WHERE id_fichero = '.$id.'');
        $table = '';
        foreach ($files as $i) {
            $table .='
                <tr>
                    <td>'.$i->nombre.'</td>
                    <td>'.$i->size.' bytes</td>
                    <td>'.$i->fecha.'</td>
                    <td>
                        <a class="btn btn-success"href="/fichero/'.$i->nombre.'">Descargar</a>
                        <button class="btn btn-danger" id="'.$i->id.'">Eliminar</button>
                    </td>
                </tr>
            ';
        }
        return $table;
    }

    public function deleteFile($id){
        $file = DB::SELECT('SELECT nombre FROM  files WHERE id = '.$id.'');
        $mi_file = public_path().'/fichero/'.$file[0]->nombre.'';
        DB::table('files')->where('id','=',$id)->delete();
        unlink($mi_file);
        return Response()->json('success');  
    }
}
