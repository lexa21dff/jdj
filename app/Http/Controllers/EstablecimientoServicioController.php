<?php

namespace App\Http\Controllers;

use App\Models\Establecimiento_Servicio;
use Illuminate\Http\Request;

class EstablecimientoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listado = Establecimiento_Servicio::select('establecimientos.id AS id_establecimiento','establecimientos.codigo AS codigo_establecimiento',
        'establecimientos.nombre AS nombre_establecimiento','establecimientos.responsable AS responsable_establecimiento','establecimientos.direccion AS direccion_establecimeinto',
        'servicios.id AS id_servicio','servicios.nombre AS nombre_servicio','servicios.codigo AS codigo_servicio','servicios.descripcion AS descripcion_servicio',
        'servicios.fecha AS fecha_servicio','servicios.hora AS hora_servicio', 'categorias.nombre AS categoria_servicio')
        ->join('establecimientos','establecimientos_servicios.establecimiento_id','=','establecimientos.id')
        ->join('servicios','establecimientos_servicios.servicio_id','=','servicios.id')
        ->join('categorias','servicios.categoria_id','=','categorias.id') 
        ->get();
        return response()->json([
            "status"=>true,
            "mensaje"=> $listado
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_establecimiento_servicio)
    {
        $create_establecimiento_servicio= Establecimiento_Servicio::select('establecimientos.id AS id_establecimiento','establecimientos.codigo AS codigo_establecimiento',
        'establecimientos.nombre AS nombre_establecimiento','establecimientos.responsable AS responsable_establecimiento','establecimientos.direccion AS direccion_establecimeinto',
        'servicios.id AS id_servicio','servicios.nombre AS nombre_servicio','servicios.codigo AS codigo_servicio','servicios.descripcion AS descripcion_servicio',
        'servicios.fecha AS fecha_servicio','servicios.hora AS hora_servicio','categorias.nombre AS categoria_servicio')
        ->join('establecimientos','establecimientos_servicios.establecimiento_id','=','establecimientos.id')
        ->join('servicios','establecimientos_servicios.servicio_id','=','servicios.id')
        ->join('categorias','servicios.categoria_id','=','categorias.id') 
        ->where('establecimientos_servicios.id','=',$id_establecimiento_servicio)
        ->first();
        return response()->json([
            "status"=> true,
            "mensajes"=>$create_establecimiento_servicio
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
        $establecimiento_servicio = new Establecimiento_Servicio();
        $establecimiento_servicio->establecimiento_id = $request ->establecimiento_id;
        $establecimiento_servicio->servicio_id = $request ->servicio_id;
        $establecimiento_servicio->save();

            return response()->json([
                'res'=> true,
                'mensaje' => $establecimiento_servicio
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Establecimiento_Servicio  $establecimiento_Servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Establecimiento_Servicio $establecimiento_Servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Establecimiento_Servicio  $establecimiento_Servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Establecimiento_Servicio $establecimiento_Servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Establecimiento_Servicio  $establecimiento_Servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_establecimiento_servicio)
    {
        $establecimiento_servicio = Establecimiento_Servicio:: where('id', $id_establecimiento_servicio)->first();
            
        $establecimiento_servicio->establecimiento_id = $request ->establecimiento_id;
        $establecimiento_servicio->servicio_id = $request ->servicio_id;

        $establecimiento_servicio->save();

            return response()->json([
                'status'=> true,
                'mensajes' => $establecimiento_servicio
            ],202);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Establecimiento_Servicio  $establecimiento_Servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id_establecimiento_servicio)
    {
        $establecimiento_servicio = Establecimiento_Servicio::where('id',$id_establecimiento_servicio)->first();
            $establecimiento_servicio ->delete();
            return response()->json([
                'response' => true,
                'message' => $establecimiento_servicio
            ],200);
    }
}
