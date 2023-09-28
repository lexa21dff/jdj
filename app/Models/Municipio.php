<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre'
    ];

    protected $hidden = [
        'created_at', 
        'updated_at'
    ];

    //Relacion de muchos a uno - Contraria
    public function municipios(){
        return $this->belongsTo('App\Models\Manzana','municipio_id', 'id');
    }
}
