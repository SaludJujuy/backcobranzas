<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'pl_numeroPlan',
        'pl_razonSocial',
        'pl_obraSocial'
    ];

    public static function registrar_plan($numeroplan,$razonsocial,$obrasocial){
        return Plan::create([
            'pl_numeroPlan'=>$numeroplan,
            'pl_razonSocial'=>$razonsocial,
            'pl_obraSocial'=>$obrasocial
        ]);
    }

    public static function modificar_plan($id,$numeroplan,$razonsocial,$obrasocial){
        $data=[
            'pl_numeroPlan'=>$numeroplan,
            'pl_razonSocial'=>$razonsocial,
            'pl_obraSocial'=>$obrasocial
        ];

        return Plan::where('id',$id)
            ->update($data);
    }

    public static function eliminar_plan($id){
        return Plan::where('id',$id)
            ->delete();
    }

    public static function listar_plan($request){
        $query=Plan::leftJoin('obra_socials as os','os.id','=','plans.pl_obraSocial')
            ->select(
                'os.os_razonSocial as SIGLAS',
                'plans.pl_razonSocial as PLAN'
            );
        if($request->filled('search')){
            $query->where('plans.pl_razonSocial','LIKE','%'.$request->input('search').'%');
        }
        return $query->orderBy('id')
            ->paginate(5);
    }
}
