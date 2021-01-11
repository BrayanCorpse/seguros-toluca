<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autos extends Model
{
    protected $table = "autos";
    protected $fillable = ["id","id_marca","id_modelo","id_submarca","id_descripcion","id_detalle","monto"];
    public $timestamps = false;
    protected $guarded = ['id'];
    
    function marcas(){
    	return $this->belongsTo('App\Marcas','id_marca');
    }

    function modelos(){
    	return $this->belongsTo('App\Modelos','id_modelo');
    }

    function submarcas(){
    	return $this->belongsTo('App\Submarcas','id_submarca');
    }

    function descripciones(){
    	return $this->belongsTo('App\Descripciones','id_descripcion');
    }

    function detalles(){
    	return $this->belongsTo('App\Detalles','id_detalle');
    }
}
