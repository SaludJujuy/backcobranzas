<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Convenio;

class Controlador_Convenio extends Controller
{
    public function registrar_convenio(Request $request){
        $numero=$request->input('numeroconvenio');
        $nombre=strtoupper($request->input('nombreconvenio'));
        try{
            Convenio::registrar_convenio($numero,$nombre);
            return response()->json(['message'=>'Convenio agregado correctamente']);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function modificar_convenio(Request $request){
        $id=$request->input('id');
        $numero=$request->input('numeroconvenio');
        $nombre=$request->input('nombreconvenio');
        try{
            Convenio::modificar_convenio($id,$numero,$nombre);
            return response()->json(['message'=>'Convenio modificado correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function eliminar_convenio(Request $request){
        $id=$request->input('id');
        try{
            Convenio::eliminar_convenio($id);
            return response()->json(['message'=>'Convenio eliminado correctamente'],200);   
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function listar_convenio(Request $request){
        try{
            return response()->json([Convenio::listar_convenio($request),200]);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }
}
