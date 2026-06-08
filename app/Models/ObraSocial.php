<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObraSocial extends Model
{
    protected $fillable = [
        'os_nroOS',
        'os_razonSocial',
        'os_siglas'
    ];

    public static function registrar_obraosical($nro,$razonsocial,$siglas){
        return ObraSocial::create([
            'os_nroOS'=>$nro,
            'os_razonSocial'=>$razonsocial,
            'os_siglas'=>$siglas
        ]);
    }

    public static function modificar_obrasocial($id,$nro,$razonsocial,$siglas){
        $data=[
            'os_nroOS'=>$nro,
            'os_razonSocial'=>$razonsocial,
            'os_siglas'=>$siglas
        ];
        return ObraSocial::where('id',$id)
            ->update($data);
    }

    public static function eliminar_obrasocial($id){
        return ObraSocial::where('id',$id)
            ->delete();
    }

    public static function listar_obrasociales($request){
        $query=ObraSocial::select(
            'id as ID',
            'os_nroOS as NROOBRASOCIAL',
            'os_razonSocial as RAZONSOCIAL',
            'os_siglas as SIGLAS'
        );
        if($request->filled('search')){
            $query->where('os_siglas','LIKE','%'.$request->input('search').'%');
        }
        return $query->orderBy('id')
            ->paginate(10);
    }
}
