<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ManzanaController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\EstablecimientoController;
use App\Http\Controllers\ManzanaServicioController;
use App\Http\Controllers\EstablecimientoServicioController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//RUTAS DE USUARIO
Route::post('registro_usuario', [UserController::class, 'registro_usuario']);
Route::post('inicio_sesion', [UserController::class, 'inicio_sesion']);
Route::post("cerrar_sesion", [UserController::class, 'cerrar_sesion'])->middleware('auth:sanctum');
Route::put("restablecer_contrasena", [UserController::class, 'restablecer_contrasena']);

//RUTAS DE MUNICIPIOS
Route::get('listar_municipios', [MunicipioController::class, 'index']);
Route::get('listar_municipio/{id_municipio}', [MunicipioController::class, 'create']);
Route::post('agregar_municipio', [MunicipioController::class, 'store']);
Route::put('actualizar_municipio/{id_municipio}', [MunicipioController::class, 'update']);
Route::delete('eliminar_municipio/{id_municipio}', [MunicipioController::class, 'destroy']);

//RUTAS DE MANZANAS
Route::get('listar_manzanas', [ManzanaController::class, 'index']);
Route::get('listar_manzana/{id_manzana}', [ManzanaController::class, 'create']);
Route::get('buscador_manzanas/{nombre_manzanas}', [ManzanaController::class, 'buscador_manzanas']);
Route::post('agregar_manzanas', [ManzanaController::class, 'store']);
Route::put('actualizar_manzana/{id_manzana}', [ManzanaController::class, 'update']);
Route::delete('eliminar_manzana/{id_manzana}', [ManzanaController::class, 'destroy']);

//LISTADO DE CATEGORIA
Route::get('listar_categorias', [CategoriaController::class, 'index']);
Route::get('listar_categoria/{id_categoria}', [CategoriaController::class, 'create']);
Route::post('agregar_categoria', [CategoriaController::class, 'store']);
Route::put('actualizar_categorias/{id_categoria}', [CategoriaController::class, 'update']);
Route::delete('eliminar_categorias/{id_categoria}', [CategoriaController::class, 'destroy']);

//RUTAS DE SERVICIOS
Route::get('listar_servicios', [ServicioController::class, 'index']);
Route::get('listar_servicio/{id_servicio}', [ServicioController::class, 'create']);
Route::get('buscador_servicios/{nombre_servicios}', [ServicioController::class, 'buscador_servicios']);
Route::post('agregar_servicio', [ServicioController::class, 'store']);
Route::put('actualizar_servicio/{id_servicio}', [ServicioController::class, 'update']);
Route::delete('eliminar_servicio/{id_servicio}', [ServicioController::class, 'destroy']);

//RUTAS DE ESTABLECIMIENTOS
Route::get('listar_establecimientos', [EstablecimientoController::class, 'index']);
Route::get('buscador_establecimientos/{nombre_establecimientos}', [EstablecimientoController::class, 'buscador_establecimientos']);
Route::get('listar_establecimiento/{id_establecimiento}', [EstablecimientoController::class, 'create']);
Route::post('agregar_establecimiento', [EstablecimientoController::class, 'store']);
Route::put('actualizar_establecimiento/{id_establecimiento}', [EstablecimientoController::class, 'update']);
Route::delete('eliminar_establecimiento/{id_establecimiento}', [EstablecimientoController::class, 'destroy']);

//RUTAS DE MUCHOS A MUCHOS

Route::get('listado_servicios_manzanas', [ManzanaServicioController::class, 'index']);
Route::get('listar_servicio_manzana/{id_servicio_manzana}', [ManzanaServicioController::class, 'create']);
Route::post('agregar_servicio_manzana', [ManzanaServicioController::class, 'store']);
Route::put('actualizar_servicio_manzana/{id_servicio_manzana}', [ManzanaServicioController::class, 'update']);
Route::delete('eliminar_servicio_manzana/{id_servicio_manzana}', [ManzanaServicioController::class, 'destroy']);

//RUTAS DE MUCHOS A MUCHOS

Route::get('listado_establecimiento_servicio', [EstablecimientoServicioController::class, 'index']);
Route::get('listar_establecimiento_servicio/{id_establecimiento_manzana}', [EstablecimientoServicioController::class, 'create']);
Route::post('agregar_establecimiento_servicio', [EstablecimientoServicioController::class, 'store']);
Route::put('actualizar_establecimiento_servicio/{id_establecimiento_servicio}', [EstablecimientoServicioController::class, 'update']);
Route::delete('eliminar_establecimiento_servicio/{id_establecimiento_servicio}', [EstablecimientoServicioController::class, 'destroy']);


