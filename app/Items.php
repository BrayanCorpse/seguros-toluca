<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'items';
    protected $fillable = ['id','fecha','cantidad','precio','subtotal','id_venta','id_producto'];
    public $timestamps = false;
}
