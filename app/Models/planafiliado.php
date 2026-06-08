<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class planafiliado extends Model
{
    protected $fillable = [
        'pa_afiliado',
        'pa_plan',
        'pa_fechaalta',
        'pa_fechabaja'
    ];

    public static function registrar_planafiliado($afiliado,$plan,$fechaalta,$fechabaja){
        return planafiliado::create([
            'pa_afiliado'=>$afiliado,
            'pa_plan'=>$plan,
            'pa_fechaalta'=>$fechaalta,
            'pa_fechabaja'=>$fechabaja
        ]);
    }

    public static function modificar_planafiliado($id,$afiliado,$plan,$fechaalta,$fechabaja){
        $data=[
            'pa_afiliado'=>$afiliado,
            'pa_plan'=>$plan,
            'pa_fechaalta'=>$fechaalta,
            'pa_fechabaja'=>$fechabaja
        ];
        return planafiliado::where('id',$id)
            ->update($data);
    }

    public static function eliminar_planafiliado($id){
        return planafiliado::where('id',$id)
            ->delete();
    }

    public static function listar_planafiliados($request){
        $query=planafiliado::leftJoin('afiliados as af','af.id','=','planafiliados.pa_afiliado')
            ->leftJoin('plans af pl','pl.id','=','planafiliados.pa_plan')
            ->select(
                'pl.razonSocial as NOMBREPLAN',
                'af.af_nroAfiliado as NROAFILIADO',
                'af.af_orden as ORDEN',
                'af.af_cuil as CUIL',
                'af.af_dni as DNI',
                'af.af_apellidoNombre as NOMBRECOMPLETO',
                'af.af_sexo as SEXO',
                'af.af_fechaNacimiento as FECHANACIMIENTO',
                'af.af_parentesco as PARENTESCO'
            );
        if($request->filled('search')){
            $query->where('pl.razonSocial','LIKE','%'.$request->input('search').'%');
        }
        return $query->orderBy('id')
            ->paginate(10);
    }
}
