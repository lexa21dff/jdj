<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listado_servicios = Servicio::select('servicios.id AS id_servicio','servicios.codigo AS codigo','servicios.nombre AS nombre',
        'servicios.descripcion AS descripcion','servicios.fecha AS fecha','servicios.hora AS hora',
        'categorias.nombre AS categoria','servicios.categoria_id')
        ->join('categorias','servicios.categoria_id','categorias.id')
        ->get();
        return $listado_servicios;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_servicio)
    {
        $create_servicio= Servicio::select('servicios.id AS id_servicio','servicios.codigo AS codigo','servicios.nombre AS nombre',
        'servicios.descripcion AS descripcion','servicios.fecha AS fecha','servicios.hora AS hora',
        'categorias.nombre AS categoria','servicios.categoria_id')
        ->join('categorias','servicios.categoria_id','categorias.id')
        ->where('servicios.id','=',$id_servicio)
        ->first();
        return response()->json([
            "status"=> true,
            "mensajes"=>$create_servicio
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
        $agregar_servicio = new Servicio();
        $agregar_servicio -> codigo = $request-> codigo;
        $agregar_servicio -> nombre = $request -> nombre;
        $agregar_servicio -> descripcion = $request -> descripcion;
        $agregar_servicio -> fecha = $request -> fecha;
        $agregar_servicio -> hora = $request -> hora;
        $agregar_servicio -> categoria_id = $request -> categoria_id;
        $agregar_servicio ->save();

        return response()->json([
            'status' => true,
            'mensaje '=> $agregar_servicio
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_servicio)
    {
        $actualizar_servicio =  Servicio:: where('id',$id_servicio)->first();
        $actualizar_servicio -> codigo = $request-> codigo;
        $actualizar_servicio -> nombre = $request -> nombre;
        $actualizar_servicio -> descripcion = $request -> descripcion;
        $actualizar_servicio -> fecha = $request -> fecha;
        $actualizar_servicio -> hora = $request -> hora;
        $actualizar_servicio -> categoria_id = $request -> categoria_id;
        $actualizar_servicio ->save();

        return response()->json([
            'status'=> true,
            'mensaje'=> $actualizar_servicio
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio, $id_servicio)
    {
        $eliminar_servicio= Servicio::where('id',$id_servicio)->first();
            $eliminar_servicio->delete();
            return response()->json([
                'response' => true,
                'message' => $eliminar_servicio
            ],200);
    }

    public function buscador_servicios($nombre_servicio){
        $listar_servicio = Servicio::where('servicios.nombre','like','%'.$nombre_servicio.'%')
        ->first();
        return response()->json([
            "status"=>true,
            "mensajes"=> $listar_servicio
        ], 200);
    }
}
