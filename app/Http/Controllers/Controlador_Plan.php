<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class Controlador_Plan extends Controller
{
    public function registrar_plan(Request $request){
        $nroplan=$request->input('nroplan');
        $razonsocial=strtoupper($request->input('razonsocial'));
        $obrasocial=$request->input('obrasocial');

        try{
            Plan::registrar_plan($nroplan,$razonsocial,$obrasocial);
            return response()->json(['message'=>'Plan registrado con exito'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function modificar_plan(Request $request){
        $id=$request->input('id');
        $nroplan=$request->input('nroplan');
        $razonsocial=strtoupper($request->input('razonsocial'));
        $obrasocial=$request->input('obrasocial');

        try{
            Plan::modificar_plan($id,$nroplan,$razonsocial,$obrasocial);
            return response()->json(['message'=>'Plan modificado existosamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function eliminar_plan(Request $request){
        $id=$request->input('id');

        try{
            Plan::eliminar_plan($id);
            return response()->json(['message'=>'Plan eliminado correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function listar_plan(Request $request){
        try{
            return response()->json(Plan::listar_plan($request));
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }
}
