<?php

namespace App\Http\Controllers;

use App\Models\Manzana_Servicio;
use Illuminate\Http\Request;

class ManzanaServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listado = Manzana_Servicio::select('manzanas.id AS id_manzana','manzanas.nombre AS nombre_manzana','manzanas.codigo AS codigo_manzana',
        'manzanas.localidad AS localidad_manzana','manzanas.direccion AS direccion_manzana', 'municipios.nombre AS municipio_manzana',
        'servicios.id AS id_servicio','servicios.nombre AS nombre_servicio','servicios.codigo AS codigo_servicio',
        'servicios.descripcion AS discripcion_servicio','servicios.fecha AS fecha_servicio', 'servicios.hora AS hora_servicio','categorias.nombre AS categoria_servicio')
        ->join('manzanas','manzanas_servicios.manzana_id','=','manzanas.id')
        ->join('servicios','manzanas_servicios.servicio_id','=','servicios.id')
        ->join('municipios','manzanas.municipio_id','=','municipios.id')
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
    public function create($id_manzana_servicio)
    {
        $create_manzana_servicio= Manzana_Servicio::select('manzanas.id AS id_manzana','manzanas.nombre AS nombre_manzana','manzanas.codigo AS codigo_manzana',
        'manzanas.localidad AS localidad_manzana','manzanas.direccion AS direccion_manzana', 'municipios.nombre AS municipio_manzana',
        'servicios.id AS id_servicio','servicios.nombre AS nombre_servicio','servicios.codigo AS codigo_servicio','servicios.descripcion AS descripcion_servicio',
        'servicios.fecha AS fecha_servicio','servicios.hora AS hora_servicio','categorias.nombre AS categoria_servicio')
        ->join('manzanas','manzanas_servicios.manzana_id','=','manzanas.id')
        ->join('servicios','manzanas_servicios.servicio_id','=','servicios.id')
        ->join('municipios','manzanas.municipio_id','=','municipios.id')
        ->join('categorias','servicios.categoria_id','=','categorias.id')
        ->where('manzanas_servicios.id','=',$id_manzana_servicio)
        ->first();
        return response()->json([
            "status"=> true,
            "mensajes"=>$create_manzana_servicio
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
        /* $validar= Validator::make($request->all(), [
            'author_id'=> 'required',
            'material_id'=> 'required'
        ]); */
        /* if(!$validar ->fails()){ */
            $manzana_servicio = new Manzana_Servicio();
            
            $manzana_servicio->manzana_id = $request ->manzana_id;
            $manzana_servicio->servicio_id = $request ->servicio_id;

            $manzana_servicio->save();

            return response()->json([
                'res'=> true,
                'mensaje' => $manzana_servicio
            ]);
        /* }else{ */
            /* return response()->json([
                'res'=> false,
                'mensaje' => 'Error Entrada Duplicada' 
            ]); */
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manzana_Servicio  $manzana_Servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Manzana_Servicio $manzana_Servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manzana_Servicio  $manzana_Servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Manzana_Servicio $manzana_Servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manzana_Servicio  $manzana_Servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_manzana_servicio)
    {
            $manzana_servicio = Manzana_Servicio:: where('id', $id_manzana_servicio)->first();
            
            $manzana_servicio->manzana_id = $request ->manzana_id;
            $manzana_servicio->servicio_id = $request ->servicio_id;

            $manzana_servicio->save();

            return response()->json([
                'res'=> true,
                'mensaje' => $manzana_servicio
            ],202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manzana_Servicio  $manzana_Servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id_manzana_servicio)
    {
        $manzana_servicio = Manzana_Servicio::where('id',$id_manzana_servicio)->first();
            $manzana_servicio ->delete();
            return response()->json([
                'response' => true,
                'message' => $manzana_servicio
            ],200);
    }
}
