<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    protected $fillable = [
        'conv_numero',
        'conv_nombre'
    ];

    public static function registrar_convenio($numero,$nombre){
        return Convenio::create([
            'conv_numero'=>$numero,
            'conv_nombre'=>$nombre
        ]);
    }

    public static function modificar_convenio($id,$numero,$nombre){
        $data=[
            'conv_numero'=>$numero,
            'conv_nombre'=>$nombre
        ];
        return Convenio::where('id',$id)
            ->update($data);
    }

    public static function eliminar_convenio($id){
        return Convenio::where('id',$id)
            ->delete();
    }

    public static function listar_convenio($request){
        $query=Convenio::select(
            'conv_numero as NUMERO',
            'conv_nombre as NOMBRECONVENIO'
        );
        if($request->filled('search')){
            $query->where('conv_numero','LIKE','%'.$request->input('search').'%');
        }
        return $query->orderBy('id')
            ->paginate(5);
    }
}
