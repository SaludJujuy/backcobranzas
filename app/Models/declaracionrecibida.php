<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class declaracionrecibida extends Model
{
    protected $filiable=[
        'dr_cabeceradetalles',
        'dr_periodo',
        'dr_declaracionjurada',
        'dr_cct',
        'dr_aportecontribucionrecibida'
    ];

    public static function registrar_declaracionesrecibidas($cabeceradetalle,$periodo,$declaracionjurada,$cct,$aportecontribucionrecibida){
        return declaracionrecibida::create([
            'dr_cabeceradetalles'=>$cabeceradetalle,
            'dr_periodo'=>$periodo,
            'dr_declaracionjurada'=>$declaracionjurada,
            'dr_cct'=>$cct,
            'dr_aportecontribucionrecibida'=>$aportecontribucionrecibida
        ]);
    }

    public static function modificar_declaracionesrecibidas($id,$cabeceradetalle,$periodo,$declaracionjurada,$cct,$aportecontribucionrecibida){
        $data=[
            'dr_cabeceradetalles'=>$cabeceradetalle,
            'dr_periodo'=>$periodo,
            'dr_declaracionjurada'=>$declaracionjurada,
            'dr_cct'=>$cct,
            'dr_aportecontribucionrecibida'=>$aportecontribucionrecibida
        ];

        return declaracionrecibida::where('id',$id)
            ->update($data);
    }

    public static function eliminar_declaracionesrecibidas($id){
        return declaracionrecibida::where('id',$id)
            ->delete();
    }

    public static function listar_declaracionesrecibidas($request){
        $query=declaracionrecibida::select(
            '*'
        );
        if($request->filled('search')){
            $query->where('dr_periodo','LIKE','%'.$request->input('search').'%');
        }
        return $query->orderBy('id')
            ->paginate(10);
    }
}
