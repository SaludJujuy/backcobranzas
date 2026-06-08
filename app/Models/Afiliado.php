<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    protected $fillable = [
        'af_nroAfiliado',
        'af_orden',
        'af_cuil',
        'af_dni',
        'af_apellidoNombre',
        'af_sexo',
        'af_fechaNacimiento',
        'af_parentesco'
    ];

    public static function registrar_afiliado($nroafiliado,$orden,$cuil,$dni,$apellidonombre,$sexo,$fechanacimiento,$parentesco){
        return Afiliado::create([
            'af_nroAfiliado'=>$nroafiliado,
            'af_orden'=>$orden,
            'af_cuil'=>$cuil,
            'af_dni'=>$dni,
            'af_apellidoNombre'=>$apellidonombre,
            'af_sexo'=>$sexo,
            'af_fechaNacimiento'=>$fechanacimiento,
            'af_parentesco'=>$parentesco
        ]);
    }

    public static function modificar_afiliado($id,$nroafiliado,$orden,$cuil,$dni,$apellidonombre,$sexo,$fechanacimiento,$parentesco){
        $data=[
            'af_nroAfiliado'=>$nroafiliado,
            'af_orden'=>$orden,
            'af_cuil'=>$cuil,
            'af_dni'=>$dni,
            'af_apellidoNombre'=>$apellidonombre,
            'af_sexo'=>$sexo,
            'af_fechaNacimiento'=>$fechanacimiento,
            'af_parentesco'=>$parentesco
        ];
        
        return Afiliado::where('id',$id)
            ->update($data);
    }

    public static function eliminar_afiliado($id){
        return Afiliado::where('id',$id)
            ->delete();
    }

    public static function listar_afiliados($request){
        $query=Afiliado::select(
            'id as ID',
            'af_nroAfiliado as NROAFILIADO',
            'af_orden as ORDEN',
            'af_cuil as CUIL',
            'af_dni as DNI',
            'af_apellidoNombre as NOMBRECOMPLETO',
            'af_sexo as SEXO',
            'af_fechaNacimiento as FECHANACIMIENTO',
            'af_parentesco as PARENTESCO'
        );

        if($request->filled('search')){
            $query->where('af_nroAfiliado','LIKE','%'.$request->input('search').'%');
                //->orWhere('af_cuil','LIKE','%'.$request->input('search').'%')
                //->orwhere('af_apellidoNombre','LIKE','%'.$request->input('search').'%');
        }

        return $query->orderBy('id')
            ->paginate(10);
    }
}
