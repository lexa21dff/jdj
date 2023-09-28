<?php

namespace App\Http\Controllers;

use App\Models\Manzana;
use Illuminate\Http\Request;

class ManzanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listar_manzanas = Manzana::select('manzanas.id AS id_manzana','manzanas.nombre AS nombre',
        'manzanas.localidad AS localidad','manzanas.direccion AS direccion','municipios.nombre AS municipio','manzanas.municipio_id')
        ->join('municipios','manzanas.municipio_id','municipios.id')
        ->get();
        return $listar_manzanas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_manzana)
    {
        $listar_manzana = Manzana::select('manzanas.id AS id_manzana','manzanas.nombre AS nombre','manzanas.localidad AS localidad',
        'manzanas.direccion AS direccion','municipios.nombre AS municipio','manzanas.municipio_id')
        ->join('municipios','manzanas.municipio_id','municipios.id')
        ->where('manzanas.id','=' ,$id_manzana)
        ->first();
        return response()->json([
            "status"=>true,
            "mensajes"=> $listar_manzana
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agregar_manzanas= new Manzana();
        $agregar_manzanas->codigo = $request -> codigo;
        $agregar_manzanas -> nombre = $request -> nombre;
        $agregar_manzanas ->localidad = $request ->localidad;
        $agregar_manzanas -> direccion = $request ->direccion;
        $agregar_manzanas -> municipio_id = $request ->municipio_id;
        $agregar_manzanas -> save();

        return response()->json([
            'status' => true,
            'mensaje' => $agregar_manzanas
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manzana  $manzana
     * @return \Illuminate\Http\Response
     */
    public function show(Manzana $manzana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manzana  $manzana
     * @return \Illuminate\Http\Response
     */
    public function edit(Manzana $manzana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manzana  $manzana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_manzana)
    {
        $actualizar_manzanas = Manzana::where('id', $id_manzana)->first();
        $actualizar_manzanas->codigo = $request -> codigo;
        $actualizar_manzanas -> nombre = $request -> nombre;
        $actualizar_manzanas ->localidad = $request ->localidad;
        $actualizar_manzanas -> direccion = $request ->direccion;
        $actualizar_manzanas -> municipio_id = $request ->municipio_id;

        $actualizar_manzanas -> save();

        return response()->json([
            'status' => true,
            'mensaje' => $actualizar_manzanas
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manzana  $manzana
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manzana $manzana, $id_manzana)
    {
        $eliminar_manzana= Manzana::where('id',$id_manzana)->first();
            $eliminar_manzana->delete();
            return response()->json([
                'response' => true,
                'message' => $eliminar_manzana
            ],200);
    }

    public function buscador_manzanas($nombre_manzana){
        $listar_manzana = Manzana::select('manzanas.id AS id_manzana','manzanas.nombre AS nombre','manzanas.localidad AS localidad',
        'manzanas.direccion AS direccion','municipios.nombre AS municipio')
        ->join('municipios','manzanas.municipio_id','municipios.id')
        ->where('manzanas.nombre','like','%'.$nombre_manzana.'%')
        ->first();
        return response()->json([
            "status"=>true,
            "mensajes"=> $listar_manzana
        ], 200);
    }
}
