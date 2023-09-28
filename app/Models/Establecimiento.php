<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    protected $table = 'establecimientos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'codigo',
        'nombre',
        'responsable',
        'direccion'
    ];

    protected $hidden = [
        'created_at', 
        'updated_at'
    ];

    //Relacion de muchos a uno - Contraria
    public function establecimiento_servicios(){
        return $this->belongsTo('App\Models\Establecimiento_Servicio','establecimiento_id', 'id');
    }
}
