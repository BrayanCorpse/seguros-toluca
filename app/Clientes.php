<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = "clientes";
    protected $fillable = ["id","nombre","ap_paterno","ap_materno","genero","edad","telefono","correo","id_municipio","calle","no_int","no_ext","c_p","id_estado"];
    public $timestamps = false;
    protected $guarded = ['id'];

    public function polizas(){
    	return $this->hasMany('App\Polizas');
    }

    public function municipios(){
    	return $this->belongsTo('App\Municipios','id_municipio');
    }

    public function estados(){
    	return $this->belongsTo('App\Estados','id_estado');
    }
}
