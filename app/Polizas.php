<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Polizas extends Model
{
    protected $table = "polizas";
    protected $fillable = ["id","poliza","fecha_registro","aseguradora","importe","moneda","forma_pago","fecha_vigencia","id_cli"];
    public $timestamps = false;
    protected $guard = ["id"];

    public function clientes(){
    	return $this->belongsTo('App\Clientes','id_cli');
    }

    public function aseguradoras(){
    	return $this->belongsTo('App\Aseguradoras','aseguradora');
    }
}
