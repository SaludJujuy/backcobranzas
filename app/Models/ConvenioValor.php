<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConvenioValor extends Model
{
    protected $filiable = [
        'cv_convenio',
        'cv_periodo',
        'cv_mes',
        'cv_anio',
        'cv_valor'        
    ];

    public static function registrar_conveniovalor($convenio,$periodo,$mes,$anio,$valor){
        return ConvenioValor::create([
            'cv_convenio'=>$convenio,
            'cv_periodo'=>$periodo,
            'cv_mes'=>$mes,
            'cv_anio'=>$anio,
            'cv_valor'=>$valor
        ]);
    }

    public static function modificar_conveniovalor($id,$convenio,$periodo,$mes,$anio,$valor){
        $data=[
            'cv_convenio'=>$convenio,
            'cv_periodo'=>$periodo,
            'cv_mes'=>$mes,
            'cv_anio'=>$anio,
            'cv_valor'=>$valor
        ];
        return ConvenioValor::where('id',$id)
            ->update($data);
    }

    public static function eliminar_conveniovalor($id){
        return ConvenioValor::where('id',$id)
            ->delete();
    }

    public static function listar_conveniovalor($request){
        $query=ConvenioValor::leftJoin('convenio as conv','conv.id','=','conveniovalor.cv_convenio')
            ->select(
                'conv.conv_nombre as CONVENIO',
                'conveniovalor.cv_periodo as PERIODO',
                'conveniovalor.cv_mes as MES',
                'conveniovalor.cv_anio as ANIO',
                'conveniovalor.cv_valor as VALOR'
            );
        if($request->filled('search')){
            $query->where('conv.conv_nombre','LIKE','%'.$request->input('search').'%');
        }
        return $query->orderBy('id')
            ->paginate(5);
    }
}
