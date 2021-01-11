<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = "modulo";
    protected $fillable = ["id","marca","modelo","submarca","descripcion","detalle","genero","nombre","edad","correo","telefono","cobertura","monto","forma_pago","cuota","mensualidad","total"];
    public $timestamps = false;
    protected $guarded = ['id'];
    
    function marcas(){
    	return $this->belongsTo('App\Marcas','marca');
    }

    function modelos(){
    	return $this->belongsTo('App\Modelos','modelo');
    }

    function submarcas(){
    	return $this->belongsTo('App\Submarcas','submarca');
    }

    function descripciones(){
    	return $this->belongsTo('App\Descripciones','descripcion');
    }

    function detalles(){
    	return $this->belongsTo('App\Detalles','detalle');
    }
}
