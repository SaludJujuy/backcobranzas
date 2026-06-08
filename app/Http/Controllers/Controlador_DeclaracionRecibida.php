<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\declaracionrecibida;

class Controlador_DeclaracionRecibida extends Controller
{
    public function registrar_declaracionrecibida($request){
        $cabeceradetalle=$request->input('cabeceradetalle');
        $periodo=$request->input('periodo');
        $declaracionjurada=$request->input('declaracionjurada');
        $cct=$request->input('cct');
        $aportecontriubcionrecibida=$request->input('aportecontribucionrecibida');
        try{
            declaracionrecibida::registrar_declaracionesrecibidas($cabeceradetalle,$periodo,$declaracionjurada,$cct,$aportecontriubcionrecibida);
            return response()->json(['meesage'=>'registro realizado correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }


    public function modificar_declaracionrecibida(Request $request){
        $id=$request->input('id');
        $cabeceradetalle=$request->input('cabeceradetalle');
        $periodo=$request->input('periodo');
        $declaracionjurada=$request->input('declaracionjurada');
        $cct=$request->input('cct');
        $aportecontriubcionrecibida=$request->input('aportecontribucionrecibida');
        try{
            declaracionrecibida::modificar_declaracionesrecibidas($id,$cabeceradetalle,$periodo,$declaracionjurada,$cct,$aportecontriubcionrecibida);
            return response()->json(['meesage'=>'registro realizado correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function eliminar_declaracionrecibida(Request $request){
        $id=$request->input('id');
        try{
            declaracionrecibida::eliminar_cabeceradetalle($id);
            return response()->json(['meesage'=>'eliminacion realizada correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }       
    }

    public function listar_declaracionrecibida(Request $request){
        try{
            return response()->json([declaracionrecibida::listar_declaracionesrecibidas($request)]);
        }catch(\Throwable $th){
            $th="error exception";
        }
    }
}
