<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table = 'ventas';
    protected $fillable = ['id','fecha','id_user','total','productos'];
    public $timestamps = false;
}
