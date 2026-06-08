<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estadoAfiliado;

class Controlador_AfiliadoEstado extends Controller
{
    public function registrar_afiliadoestado(Request $request){
        $afiliado=$request->input('afiliado');
        $fechaalta=$request->input('fechalata');
        $fechabaja=$request->input('fechabaja');
        $estado=$request->input('estado');
        try{
            estadoAfiliado::registrar_estadoafiliado($afiliado,$fechaalta,$fechabaja,$estado);
            return response()->json(['message'=>'registro realizado correctamente'],200);
        }catch(\Throwable){
            $th="error exception";
            echo($th);
        }
    }

    public function modificar_afiliadoestado(Request $request){
        $id=$request->input('id');
        $afiliado=$request->input('afiliado');
        $fechaalta=$request->input('fechalata');
        $fechabaja=$request->input('fechabaja');
        $estado=$request->input('estado');
        try{
            estadoAfiliado::modificar_estadoafiliado($id,$afiliado,$fechaalta,$fechabaja,$estado);
            return response()->json(['message'=>'registro realizado correctamente'],200);
        }catch(\Throwable){
            $th="error exception";
            echo($th);
        }
    }

    public function eliminar_afiliadoestado(Request $request){
        $id=$request->input('id');
        try{
            estadoAfiliado::eliminar_estadoafiliado($id);
            return response()->json(['meesage'=>'eliminacion realizada correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        } 
    }

    public function listar_afiliadoestado(Request $request){
        try{
            return response()->json([estadoAfiliado::listar_estadoafiliado($request)]);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        } 
    }
}
