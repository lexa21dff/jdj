<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manzana extends Model
{
    protected $table = 'manzanas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'codigo',
        'nombre',
        'localidad',
        'direccion',
        'municipio_id'
    ];

    protected $hidden = [
        'created_at', 
        'updated_at'
    ];

    //Relacion de muchos a uno 
    public function municipios(){
        return $this->hasMany('App\Models\Municipio', 'municipio_id','id');
    }

    
}

