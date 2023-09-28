<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Establecimiento_Servicio extends Model
{
    protected $table = 'establecimientos_servicios';

    protected $primaryKey = 'id';

    protected $fillable = [
        'establecimiento_id',
        'servicio_id'
    ];

    protected $hidden = [
        'created_at', 
        'updated_at'
    ];

    //Relacion de muchos a uno 
    public function establecimientos(){
        return $this->hasMany('App\Models\Establecimiento', 'establecimiento_id','id');
    }

    //Relacion de muchos a uno 
    public function servicios(){
        return $this->hasMany('App\Models\Servicio', 'servicio_id','id');
    }
}
