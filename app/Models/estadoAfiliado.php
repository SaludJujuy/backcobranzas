<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class estadoAfiliado extends Model
{
    protected $fillable = [
        'ea_afiliado',
        'ea_fechaalta',
        'ea_fechabaja',
        'ea_estado'
    ];

    public static function registrar_estadoafiliado($afiliado,$fechaalta,$fechabaja,$estado){
        return estadoAfiliado::create([
            'ea_afiliado'=>$afiliado,
            'ea_fechaalta'=>$fechaalta,
            'ea_fechabaja'=>$fechabaja,
            'ea_estado'=>$estado
        ]);
    }

    public static function modificar_estadoafiliado($id,$afiliado,$fechaalta,$fechabaja,$estado){
        $data=[
            'ea_afiliado'=>$afiliado,
            'ea_fechaalta'=>$fechaalta,
            'ea_fechabaja'=>$fechabaja,
            'ea_estado'=>$estado
        ];
        return estadoAfiliado::where('id',$id)
            ->update($data);
    }

    public static function eliminar_estadoafiliado($id){
        return estadoAfiliado::where('id',$id)
            ->delete();
    }

    public static function listar_estadoafiliado($request){
        $query=estadoAfiliado::leftJoin('afiliados as af','af.id','=','estaodAfiliado.ea_afiliado')
            ->select(
                'af_nroAfiliado as NROAFILIADO',
                'af_orden as ORDEN',
                'af_cuil as CUIL',
                'af_dni as DNI',
                'af_apellidoNombre as NOMBRECOMPLETO',
                'af_sexo as SEXO',
                'af_fechaNacimiento as FECHANACIMIENTO',
                'af_parentesco as PARENTESCO',
                'ea.ea_fechaalta as FECHAALTA',
                'ea.ea_fechabaja as FECHABAJA',
                'ea.ea_estado'
            );
        if($request->filled('bueno')){
            $query->where('af_nroAfiliado','LIKE','%'.$request->input('search').'%')
                ->orWhere('af_cuil','LIKE','%'.$request->input('search').'%')
                ->orwhere('af_apellidoNombre','LIKE','%'.$request->input('search').'%');
        }
        return $query->orderBy('id')
            ->paginate(10);
    }
}
