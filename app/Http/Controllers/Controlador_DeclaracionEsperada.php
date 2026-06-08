<?php

namespace App\Http\Controllers;

use App\Models\declaracionesperada;
use Illuminate\Http\Request;

class Controlador_DeclaracionEsperada extends Controller
{

    public function registrar_declaracionesperada(Request $request){
        $cabeceradetalle=$request->input('cabeceradetalle');
        $periodo=$request->input('periodo');
        $aportescontribucionesperado=$request->input('aportecontribucionesperado');
        try{
            declaracionesperada::registrar_declaracionesperada($cabeceradetalle,$periodo,$aportescontribucionesperado);
            return response()->json(['meesage'=>'registro realizado correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function modificar_declaracionesperada(Request $request){
        $id=$request->input('id');
        $cabeceradetalle=$request->input('cabeceradetalle');
        $periodo=$request->input('periodo');
        $aportescontribucionesperado=$request->input('aportecontribucionesperado');
        try{
            declaracionesperada::modificar_declaracionesperada($id,$cabeceradetalle,$periodo,$aportescontribucionesperado);
            return response()->json(['meesage'=>'modificacion realizada correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function eliminar_declaracionesperada(Request $request){
        $id=$request->input('id');
        try{
            declaracionesperada::eliminar_declaracionesperada($id);
            return response()->json(['meesage'=>'eliminacion realizada correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }       
    }

    public function listar_declaracionesperada(Request $request){
        try{
            return response()->json([declaracionesperada::listar_declaracionesperada($request)]);
        }catch(\Throwable $th){
            $th="error exception";
        }
    }
}
