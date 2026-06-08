<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class Controlador_Empresa extends Controller
{
    public function registrar_empresa(Request $request){
        $cuit=$request->input('cuit');
        $razonsocial=strtoupper($request->input('razonsocial'));
        $domicilio=strtoupper($request->input('domicilio'));
        $telefono=strtoupper($request->input('telefono'));

        try{
            Empresa::registrar_empresa($cuit,$razonsocial,$domicilio,$telefono);
            return response()->json(['message'=>'Empresa registrada correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }

    }

    public function modificar_empresa(Request $request){
        $id=$request->input('id');
        $cuit=$request->input('cuit');
        $razonsocial=strtoupper($request->input('razonsocial'));
        $domicilio=strtoupper($request->input('domicilio'));
        $telefono=strtoupper($request->input('telefono'));

        try{
            Empresa::modificar_empresa($id,$cuit,$razonsocial,$domicilio,$telefono);
            return response()->json(['message'=>'Empresa modificada correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function eliminar_empresa(Request $request){
        $id=$request->input('id');
        try{
            Empresa::eliminar_empresa($id);
            return response()->json(['message'=>'Empresa eliminada correctamente',200]);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function listar_empresa(Request $request){
        try{
            return response()->json([Empresa::listar_empresa($request)]);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }
}
