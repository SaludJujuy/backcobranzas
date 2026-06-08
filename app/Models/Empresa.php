<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'emp_cuit',
        'emp_razonSocial',
        'emp_domicilio',
        'emp_telefono'
    ];
    
    public static function registrar_empresa($cuit,$razonsocial,$domicilio,$telefono){
        return Empresa::create([
            'emp_cuit'=>$cuit,
            'emp_razonSocial'=>$razonsocial,
            'emp_domicilio'=>$domicilio,
            'emp_telefono'=>$telefono
        ]);
    }

    public static function modificar_empresa($id,$cuit,$razonsocial,$domicilio,$telefono){
        $data=[
            'emp_cuit'=>$cuit,
            'emp_razonSocial'=>$razonsocial,
            'emp_domicilio'=>$domicilio,
            'emp_telefono'=>$telefono
        ];

        return Empresa::where('id',$id)
            ->update($data);
    }

    public static function eliminar_empresa($id){
        return Empresa::where('id',$id)
            ->delete();
    }

    public static function listar_empresa($request){
        $query=Empresa::select(
            'id as ID',
            'emp_cuit as CUIT',
            'emp_razonSocial as RAZONSOCIAL',
            'emp_domicilio as DOMICILIO',
            'emp_telefono as TELEFONO'
        );

        if($request->filled('search')){
            $query->where('emp_cuit','LIKE','%'.$request->input('search').'%')
            ->orWhere('emp_razonSocial','LIKE','%'.$request->input('search').'%');
        }
        return $query->orderBy('id')
            ->paginate(10);
    }
}
