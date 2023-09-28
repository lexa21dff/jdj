<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre'
    ];

    protected $hidden = [
        'created_at', 
        'updated_at'
    ];

    //Relacion de muchos a uno - Contraria
    public function servicios(){
        return $this->belongsTo('App\Models\Servicio','categoria_id', 'id');
    }
}
