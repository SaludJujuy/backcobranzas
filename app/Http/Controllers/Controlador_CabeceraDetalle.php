<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cabeceradetalle;
use App\Models\empresaafiliado;

class Controlador_CabeceraDetalle extends Controller
{
    public function registrar_cabeceradetalle(Request $request){
        $fecha=$request->input('fecha');
        $empresaafiliado=$request->input('empresaafiliado');
        $obrasocial=$request->input('obrasocial');
        $empresa=$request->input('empresa');
        try{
            cabeceradetalle::registrar_cabeceradetalle($fecha,$empresaafiliado,$obrasocial,$empresa);
            return response()->json(['meesage'=>'registro realizado correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function modificar_cabeceradetalle(Request $request){
        $id=$request->input('id');
        $fecha=$request->input('fecha');
        $empresaafiliado=$request->input('empresaafiliado');
        $obrasocial=$request->input('obrasocial');
        $empresa=$request->input('empresa');
        try{
            cabeceradetalle::modificar_cabeceradetalle($id,$fecha,$empresaafiliado,$obrasocial,$empresa);
            return response()->json(['meesage'=>'registro realizado correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function eliminar_cabeceradetalle(Request $request){
        $id=$request->input('id');
        try{
            cabeceradetalle::eliminar_cabeceradetalle($id);
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
        }
    }

    public function listar_planillaafiliados(Request $request){
        try{
            return response()->json([empresaafiliado::listar_empresaafiliado($request)]);
        }catch(\Throwable $th){
            $th="error exception";
        }
    }
}
