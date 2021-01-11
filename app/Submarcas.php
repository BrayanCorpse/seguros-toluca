<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submarcas extends Model
{
    protected $table = "submarcas";
    protected $fillable = ["id","submarca"];
    public $timestamps = false;
    protected $guarded = ['id'];

    function autos(){
    	return $this->hasMany('App\Autos');
    }
}
