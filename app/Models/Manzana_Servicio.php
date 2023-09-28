<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manzana_Servicio extends Model
{
    protected $table = 'manzanas_servicios';

    protected $primaryKey = 'id';

    protected $fillable = [
        'manzana_id',
        'servicio_id'
    ];

    protected $hidden = [
        'created_at', 
        'updated_at'
    ];

    //Relacion de muchos a uno 
    public function manzanas(){
        return $this->hasMany('App\Models\Manzana', 'manzana_id','id');
    }

    //Relacion de muchos a uno 
    public function servicios(){
        return $this->hasMany('App\Models\Categoria', 'servicio_id','id');
    }
}
