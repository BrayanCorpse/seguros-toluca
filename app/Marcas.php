<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    protected $table = "marcas";
    protected $fillable = ["id","marca"];
    public $timestamps = false;
    protected $guard = ["id"];

    function autos(){
    	return $this->hasMany('App\Autos');
    }
}
