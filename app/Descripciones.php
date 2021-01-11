<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descripciones extends Model
{
    protected $table = "descripciones";
    protected $fillable = ["id","descripcion"];
    public $timestamps = false;
    protected $guarded = ['id'];

    function autos(){
    	return $this->hasMany('App\Autos');
    }
}
