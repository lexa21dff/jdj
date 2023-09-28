<?php

namespace App\Http\Controllers;

use App\Models\Establecimiento;
use Illuminate\Http\Request;

class EstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listar_establecimientos = Establecimiento::all();
        return response()->json([
            "status"=> true,
            "mensaje" => $listar_establecimientos
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_establecimiento)
    {
        $create_establecimeinto= Establecimiento::where('id',$id_establecimiento)->first();
        return response()->json([
            "status"=> true,
            "mensajes"=>$create_establecimeinto
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
        $agregar_establecimiento = new Establecimiento();
        $agregar_establecimiento -> codigo = $request -> codigo;
        $agregar_establecimiento -> nombre = $request -> nombre;
        $agregar_establecimiento -> responsable = $request -> responsable;
        $agregar_establecimiento -> direccion = $request -> direccion;
        $agregar_establecimiento -> save();

        return response()->json([
            "status" => true,
            "mensajes" => $agregar_establecimiento
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Establecimiento $establecimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Establecimiento $establecimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_establecimiento)
    {
        $actualizar_establecimiento = Establecimiento:: where('id', $id_establecimiento)->first();
        $actualizar_establecimiento -> codigo = $request -> codigo;
        $actualizar_establecimiento -> nombre = $request -> nombre;
        $actualizar_establecimiento -> responsable = $request -> responsable;
        $actualizar_establecimiento -> direccion = $request -> direccion;
        $actualizar_establecimiento -> save();

        return response()->json([
            "status" => true,
            "mensajes" => $actualizar_establecimiento
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_establecimiento)
    {
        $eliminar_establecimiento= Establecimiento::where('id',$id_establecimiento)->first();
            $eliminar_establecimiento->delete();
            return response()->json([
                'response' => true,
                'message' => $eliminar_establecimiento
            ],200);
    }

    public function buscador_establecimientos($nombre_establecimiento){
        $listar_establecimientos= Establecimiento::where('establecimientos.nombre','like','%'.$nombre_establecimiento.'%')
        ->first();
        return response()->json([
            "status"=>true,
            "mensajes"=> $listar_establecimientos
        ], 200);
    }
}
