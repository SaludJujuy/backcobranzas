<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class declaracionesperada extends Model
{
    protected $fillable = [
        'de_cabeceradetalles',
        'de_periodo',
        'de_aportescontribucionesperado'
    ];

    public static function registrar_declaracionesperada($cabeceradetalles,$periodo,$aportescontribucionesperado){
        return declaracionesperada::create([
            'de_cabeceradetalles'=>$cabeceradetalles,
            'de_periodo'=>$periodo,
            'de_aportescontribucionesperado'=>$aportescontribucionesperado
        ]);
    }

    public static function modificar_declaracionesperada($id,$cabeceradetalles,$periodo,$aportescontribucionesperado){
        $data=[
            'de_cabeceradetalles'=>$cabeceradetalles,
            'de_periodo'=>$periodo,
            'de_aportescontribucionesperado'=>$aportescontribucionesperado
        ];

        return declaracionesperada::where('id',$id)
            ->update($data);
    }

    public static function eliminar_declaracionesperada($id){
        return declaracionesperada::where('id',$id)
            ->delete();
    }

    public static function listar_declaracionesperada($request){
        $query=declaracionrecibida::select(
            '*'
        );
        if($request->filled('search')){
            $query->where('de_periodo','LIKE','%'.$request->input('search').'%');
        }
        return $query->orderBy('id')
            ->paginate(10);
    }
}
