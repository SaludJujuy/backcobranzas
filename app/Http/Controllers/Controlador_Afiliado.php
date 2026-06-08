<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afiliado;

class Controlador_Afiliado extends Controller
{
    public function registrar_afiliado(Request $request){
        $nroafiliado=strtoupper($request->input('nroafiliado'));
        $orden=strtoupper($request->input('orden'));
        $cuil=strtoupper($request->input('cuil'));
        $dni=strtoupper($request->input('dni'));
        $apellidonombre=strtoupper($request->input('apellidonombre'));
        $sexo=strtoupper($request->input('sexo'));
        $fechanacimiento=strtoupper($request->input('fechanacimiento'));
        $parentesco=strtoupper($request->input('parentesco'));

        try{
            Afiliado::registrar_afiliado($nroafiliado,$orden,$cuil,$dni,$apellidonombre,$sexo,$fechanacimiento,$parentesco);
            return response()->json(['message'=>'Afiliado registrado correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function modificar_afiliado(Request $request){
        $id=$request->input('id');
        $nroafiliado=strtoupper($request->input('nroafiliado'));
        $orden=strtoupper($request->input('orden'));
        $cuil=strtoupper($request->input('cuil'));
        $dni=strtoupper($request->input('dni'));
        $apellidonombre=strtoupper($request->input('apellidonombre'));
        $sexo=strtoupper($request->input('sexo'));
        $fechanacimiento=strtoupper($request->input('fechanacimiento'));
        $parentesco=strtoupper($request->input('parentesco'));

        try{
            Afiliado::modificar_afiliado($id,$nroafiliado,$orden,$cuil,$dni,$apellidonombre,$sexo,$fechanacimiento,$parentesco);
            return response()->json(['message'=>'Afiliado modificado correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function eliminar_afiliado(Request $request){
        $id=$request->input('id');

        try{
            Afiliado::eliminar_afiliado($id);
            return response()->json(['message'=>'Afiliado eliminado correctamente'],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }

    public function listar_afiliados(Request $request){
        try{
            return response()->json([Afiliado::listar_afiliados($request)],200);
        }catch(\Throwable $th){
            $th="error exception";
            echo($th);
        }
    }
}
