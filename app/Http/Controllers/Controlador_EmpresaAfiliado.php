<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empresaafiliado;

class Controlador_EmpresaAfiliado extends Controller
{
    public function registrar_empresaafiliados(Request $request){
        $afiliado=$request->input('afiliado');
        $empresa=$request->input('empresa');
        $fechaalta=$request->input('fechaalta');
        $fechabaja=$request->input('fechabaja');
        try{
            empresaafiliado::registrar_empresaafiliado($afiliado,$empresa,$fechaalta,$fechabaja);
            return response()->json(['meesage'=>'registro realizado correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function modificar_empresaafiliados(Request $request){
        $id=$request->input('id');
        $afiliado=$request->input('afiliado');
        $empresa=$request->input('empresa');
        $fechaalta=$request->input('fechaalta');
        $fechabaja=$request->input('fechabaja');
        try{
            empresaafiliado::modificar_empresaafiliado($id,$afiliado,$empresa,$fechaalta,$fechabaja);
            return response()->json(['meesage'=>'modificacion realizada correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }        
    }

    public function eliminar_empresaafiliados(Request $request){
        $id=$request->input('id');
        try{
            empresaafiliado::eliminar_empresaafiliado($id);
            return response()->json(['meesage'=>'eliminacion realizada correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }        
    }

    public function listar_empresaafiliados(Request $request){
        try{
            return response()->json([empresaafiliado::listar_empresaafiliado($request)]);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }
}
