<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correos extends Model
{
    protected $table = "correos";
    protected $fillable = ["id","nombre","telefono","correo","mensaje"];
    public $timestamps = false;
    protected $guarded = ['id'];
}
