<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Controlador_Usuario extends Controller
{
    public function login(Request $request){
        $credenciales = $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);

        if(Auth::attempt($credenciales)){
            return response()->json(['message'=>'Autentificacion exitosa','user'=>Auth::user()],200);
        }else{
            return response()->json(['message'=>'Autentificacion fallido'],401);
        }
    }

    public function logout(){
        Auth::logout();
        return response()->json(['message'=>'Session cerrada correctamente']);
    }

    public function registrar_usuario(Request $request){
        $nombre=$request->input('name');
        $email=$request->input('email');
        $password=$request->input('password');
        try{
            User::registar_usuario($nombre,$email,$password);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }
}
