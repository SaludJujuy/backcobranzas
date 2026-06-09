<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class empresaafiliado extends Model
{
    protected $fillable = [
        'empaf_afiliado',
        'empaf_empresa',
        'empaf_fechaalta',
        'empaf_fechabaja'
    ];

    public static function registrar_empresaafiliado($afiliado,$empresa,$fechaalta,$fechabaja){
        return empresaafiliado::create([
            'empaf_afiliado'=>$afiliado,
            'empaf_empresa'=>$empresa,
            'empaf_fechaalta'=>$fechaalta,
            'empaf_fechabaja'=>$fechabaja
        ]);
    }

    public static function  modificar_empresaafiliado($id,$afiliado,$empresa,$fechaalta,$fechabaja){
       $data=[
            'empaf_afiliado'=>$afiliado,
            'empaf_empresa'=>$empresa,
            'empaf_fechaalta'=>$fechaalta,
            'empaf_fechabaja'=>$fechabaja
       ];
       return empresaafiliado::where('id',$id)
            ->update($data);
    }

    public static function eliminar_empresaafiliado($id){
        return empresaafiliado::where('id',$id)
            ->delete();
    }

    public static function listar_empresaafiliado($request){
        $query=empresaafiliado::leftJoin('empresas as emp','emp.id','=','empresaafiliados.empaf_empresa')
            ->leftJoin('afiliados as af','af.id','=','empresaafiliados.empaf_afiliado')

            ->select(
                'empresaafiliados.id as ID',
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
                $query->where('af.af_nroAfiliado','LIKE','%'.$request->input('search').'%')
                    ->orWhere('af.af_dni','LIKE','%'.$request->input('search').'%');
            }
            //dd($query->paginate(5));
            return $query->orderBy('id')
                ->paginate(10);
    }
}
