<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\ConvenioValor;

class Controlador_ConvenioValor extends Controller
{
    public function registrar_conveniovalor(Request $request){
        $convenio=$request->input('convenio');
        $periodo=$request->input('periodo');
        $mes=$request->input('mes');
        $anio=$request->input('anio');
        $valor=$request->input('valor');
        try{
            ConvenioValor::registrar_conveniovalor($convenio,$periodo,$mes,$anio,$valor);
            return response()->json(['message'=>'datos agregado con exito'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function modificar_conveniovalor(Request $request){
        $id=$request->input('id');
        $convenio=$request->input('convenio');
        $periodo=$request->input('periodo');
        $mes=$request->input('mes');
        $anio=$request->input('anio');
        $valor=$request->input('valor');
        try{
            ConvenioValor::modificar_conveniovalor($id,$convenio,$periodo,$mes,$anio,$valor);
            return response()->json(['message'=>'datos modificado con exito'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function eliminar_conveniovalor(Request $request){
        $id=$request->input('id');
        try{
            ConvenioValor::eliminar_conveniovalor($id);
            return response()->json(['message'=>'Datos eliminado correctamente'],200);   
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }    
    }

    public function listar_conveniovalor(Request $request){
        try{
            return response()->json([ConvenioValor::listar_conveniovalor($request),200]);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }
}
