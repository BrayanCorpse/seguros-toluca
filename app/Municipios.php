<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $table = "municipios";
    protected $fillable = ["id","municipio","id_estado"];
    public $timestamps = false;
    protected $guard = ["id"];

    public function estados(){
    	return $this->belongsTo('App\Estados','id_estado');
    }

    public function clientes(){
    	return $this->hasMany('App\Clientes');
    }
}
