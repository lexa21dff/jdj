<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $primaryKey = 'id';

    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'fecha',
        'hora',
        'categoria_id'
    ];

    protected $hidden = [
        'created_at', 
        'updated_at'
    ];

    //Relacion de muchos a uno - Contraria
    public function manzanas_servicios(){
        return $this->belongsTo('App\Models\Manzana_Servicio','servicio_id', 'id');
    }

    //Relacion de muchos a uno - Contraria
    public function establecimiento_servicios(){
        return $this->belongsTo('App\Models\Establecimiento_Servicio','servicio_id', 'id');
    }
}
