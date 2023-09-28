<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listado_municipios= Municipio::all();
        return $listado_municipios;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_municipio)
    {
        $create_municipio= Municipio::where('id',$id_municipio)->first();
        return response()->json([
            "status"=> true,
            "mensajes"=>$create_municipio
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
        $agregar_municipio = new Municipio();
        $agregar_municipio -> nombre = $request -> nombre;
        $agregar_municipio->save();

        return response()->json([
            'status' => true,
            'mensajes' => $agregar_municipio
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function show(Municipio $municipio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipio $municipio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_municipio)
    {
        $actualizar_municipio = Municipio:: where('id', $id_municipio)->first();
        $actualizar_municipio->nombre = $request -> nombre;
        $actualizar_municipio->save();

        return response()->json([
            'status'=>true,
            'mensaje' => $actualizar_municipio
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipio $municipio, $id_municipio)
    {
        $eliminar_municipio= Municipio::where('id',$id_municipio)->first();
            $eliminar_municipio->delete();
            return response()->json([
                'response' => true,
                'message' => $eliminar_municipio
            ],200);
    }
    
}
