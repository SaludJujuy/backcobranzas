<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObraSocial;

class Controlador_ObraSocial extends Controller
{
    public function registrar_obrasocial(Request $request){
        $nroobrasocial=$request->input('nroOS');
        $razonsocial=strtoupper($request->input('razonsocial'));
        $siglas=strtoupper($request->input('siglas'));

        try{
            ObraSocial::registrar_obraosical($nroobrasocial,$razonsocial,$siglas);
            return response()->json(['message'=>'Obra social registrada con exito'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function modificar_obrasocial(Request $request){
        $id=$request->input('id');
        $nroobrasocial=$request->input('nroOS');
        $razonsocial=strtoupper($request->input('razonsocial'));
        $siglas=strtoupper($request->input('siglas'));

        try{
            ObraSocial::modificar_obrasocial($id,$nroobrasocial,$razonsocial,$siglas);
            return response()->json(['message'=>'Obra social modificada exitosamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function eliminar_obrasocial(Request $request){
        $id=$request->input('id');

        try{
            ObraSocial::eliminar_obrasocial($id);
            return response()->json(['message'=>'Obra Social eliminada correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function listar_obrasocial(Request $request){
        try{
            return response()->json(ObraSocial::listar_obrasociales($request));
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }
}
