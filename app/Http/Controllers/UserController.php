<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;


class UserController extends Controller
{
    use HasApiTokens;

    public function registro_usuario(Request $request){

        $usuario = new User();
        $usuario->tipo_documento = $request->tipo_documento;
        $usuario->documento = $request->documento;
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->telefono = $request->telefono;
        $usuario->correo_electronico = $request->correo_electronico;
        $usuario->ciudad = $request->ciudad;
        $usuario->direccion = $request->direccion;
        $usuario->ocupacion = $request->ocupacion;
        $usuario->servicios_ocupar = $request->servicios_ocupar;
        $usuario->password = Hash::make($request->password);

        $usuario->save();

        return response()->json([
            'response' => true,
            'message' => $usuario,
        ], 201);
    }

    public function inicio_sesion(Request $request){

        $user = User::where("correo_electronico", "=", $request->correo_electronico)->first();
        // revisamos si el id es existente
        if( isset($user->id) ){
            // revisamos la encriptacion
            if(Hash::check($request->password, $user->password)){
                //creamos el token
                $token = $user->createToken("auth_token")->plainTextToken;
                //si está todo es correcto
                return response()->json([
                    "status" => 1,
                    "msg" => "usuario correctamente logeado",
                    "access_token" => $token,
                    "usr_id" => $user->id
                ]);
            }else{
                return response()->json([
                    "status" => 0,
                    "msg" => "password incorrecto",
                ]);
            }
        }else{
            return response()->json([
                "status" => 0,
                "msg" => "Usuario no registrado",
            ]);
        }
        
    }

    public function cerrar_sesion(Request $request){
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Tokens revocados con éxito'], 200);
    }

    public function restablecer_contrasena(Request $request){
        
        $validar=Validator::make($request->all(), [
            "email" => "required",
            "password" => "required",
            "newpassword"=> "required|confirmed",
        ]);
        $correo=User::where("correo_electronico","=", $request->correo_electronico)->first();
        if(isset($correo)){
            if(Hash::check($request->password, $correo->password)){
                $correo->password = Hash::make($request->newpassword);
                $correo->save();
                return response()->json([
                    'mensaje'=>"Se actualizo la contraseña correctamente"
                ]);
            }else{
                return response()->json([
                    'mensaje'=>"Contraseña no coincide"
                ]);
            }
        }else{
                return response()->json([
                    'mensaje'=>"Correo no coincide",
                    'otra'=>$correo

                ]);
            }
    }
}