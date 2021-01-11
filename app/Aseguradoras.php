<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aseguradoras extends Model
{
    protected $table = "aseguradoras";
    protected $fillable = ["id","aseguradora"];
    public $timestamps = false;
    protected $guarded = ['id'];

    public function polizas(){
    	return $this->hasMany('App\Polizas');
    }
}
