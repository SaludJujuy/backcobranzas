<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TotalAfiliado;

class Controlador_TotalAfiliado extends Controller
{
    public function registrar_totalafiliado(Request $request){
        $cabeceradetalle=$request->input('cabeceradetalle');
        $totalaporte=$request->input('totalaporte');
        $totaldeuda=$request->input('totaldeuda');
        $periodo=$request->input('periodo');

        try{
            TotalAfiliado::registrar_totalafiliado($cabeceradetalle,$totalaporte,$totaldeuda,$periodo);
            return response()->json(['message'=>'Total Afiliado registrado correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }

    }

    public function modificar_totalafiliado(Request $request){
        $id=$request->input('id');
        $cabeceradetalle=$request->input('cabeceradetalle');
        $totalaporte=$request->input('totalaporte');
        $totaldeuda=$request->input('totaldeuda');
        $periodo=$request->input('periodo');

        try{
            TotalAfiliado::modificar_totalafiliado($id,$cabeceradetalle,$totalaporte,$totaldeuda,$periodo);
            return response()->json(['message'=>'Total Afiliado modificado correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function eliminar_totalafiliado(Request $request){
        $id=$request->input('id');
        try{
            TotalAfiliado::eliminar_totalafiliado($id);
            return response()->json(['message'=>'Total Afiliado eliminado correctamente',200]);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function listar_totalafiliado(Request $request){
        try{
            return response()->json([TotalAfiliado::listar_totalafiliado($request)]);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }
}
