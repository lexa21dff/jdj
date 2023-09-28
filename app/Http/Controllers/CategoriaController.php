<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listado_categoria = Categoria::all();
        return $listado_categoria;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_categoria)
    {
        $create_categoria= Categoria::where('id',$id_categoria)->first();
        return response()->json([
            "status"=> true,
            "mensajes"=>$create_categoria
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
        $agregar_categoria = new Categoria();
        $agregar_categoria -> nombre = $request -> nombre;
        $agregar_categoria -> save();

        return response()->json([
            'status'=> true,
            'mensaje'=> $agregar_categoria
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_categoria)
    {
        $actualizar_categoria= Categoria::where('id',$id_categoria)->first();
        $actualizar_categoria -> nombre = $request -> nombre;
        $actualizar_categoria -> save();

        return response()->json([
            'status'=> true,
            'mensaje'=> $actualizar_categoria
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria, $id_categoria)
    {
        $eliminar_categoria= Categoria::where('id',$id_categoria)->first();

        /* if (!$eliminar_sondeo) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Sondeo no encontrado'
            ]);
        } */
            $eliminar_categoria->delete();
            return response()->json([
                'response' => true,
                'message' => $eliminar_categoria
            ],200);
        }
    }

