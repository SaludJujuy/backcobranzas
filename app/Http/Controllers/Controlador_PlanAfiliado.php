<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\planafiliado;

class Controlador_PlanAfiliado extends Controller
{
    public function registra_planafiliado(Request $request){
        $afiliado=$request->input('afiliado');
        $plan=$request->input('plan');
        $fechaalta=$request->input('fechaalta');
        $fechabaja=$request->input('fechabaja');

        try{
            planafiliado::registrar_planafiliado($afiliado,$plan,$fechaalta,$fechabaja);
            return response()->json(['message'=>'registro realizado correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function modificar_planafiliado(Request $request){
        $id=$request->input('id');
        $afiliado=$request->input('afiliado');
        $plan=$request->input('plan');
        $fechaalta=$request->input('fechaalta');
        $fechabaja=$request->input('fechabaja');

        try{
            planafiliado::modificar_planafiliado($id,$afiliado,$plan,$fechaalta,$fechabaja);
            return response()->json(['message'=>'registro realizado correctamente'],200);    
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function eliminar_planafiliado(Request $request){
        $id=$request->input('id');
        try{
            planafiliado::eliminar_planafiliado($id);
            return response()->json(['message'=>'registro realizado correctamente'],200);    
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function listar_planafiliado(Request $request){
        try{
            return response()->json([planafiliado::listar_planafiliados($request)]);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }
}
