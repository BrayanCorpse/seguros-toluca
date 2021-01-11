<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    protected $table = "estados";
    protected $fillable = ["id","estado"];
    public $timestamps = false;
    protected $guarded = ['id'];

    public function estados(){
    	return $this->hasMany('App\Estados');
    }

    public function clientes(){
    	return $this->hasMany('App\Clientes');
    }
}
