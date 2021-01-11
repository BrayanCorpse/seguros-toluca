<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizador extends Model
{
    protected $table = 'cotizaciones';
    protected $fillable = ['id','fecha','nombre','edad','genero','correo','telefono','id_marca','id_modelo','id_submarca','id_detalle','descripcion'];
    public $timestamps = false;
}
