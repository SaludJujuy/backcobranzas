<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TotalAfiliado extends Model
{
    protected $fillable=[
        'ta_cabeceradetalle',
        'ta_totalaporte',
        'ta_totaldeuda',
        'ta_periodo'
    ];

    public static function registrar_totalafiliado($cabeceradetalle,$totalaporte,$totaldeuda,$periodo){
        return TotalAfiliado::create([
            'ta_cabeceradetalle'=>$cabeceradetalle,
            'ta_totalaporte'=>$totalaporte,
            'ta_totaldeuda'=>$totaldeuda,
            'ta_periodo'=>$periodo
        ]);
    }

    public static function modificar_totalafiliado($id,$cabeceradetalle,$totalaporte,$totaldeuda,$periodo){
        $data=[
            'ta_cabeceradetalle'=>$cabeceradetalle,
            'ta_totalaporte'=>$totalaporte,
            'ta_totaldeuda'=>$totaldeuda,
            'ta_periodo'=>$periodo
        ];
        return TotalAfiliado::where('id',$id)
            ->update($data);
    }

    public static function eliminar_totalafiliado($id){
        return TotalAfiliado::where('id',$id)
            ->delete();
    }

    public static function listar_totalafiliado($request){
        $query = TotalAfiliado::leftJoin('cabeceradetalles as cd', 'cd.id', '=', 'total_afiliados.ta_cabeceradetalle')
            ->leftJoin('empresaafiliados as empaf', 'empaf.id', '=', 'cd.cd_empresaafiliados')
            ->leftJoin('afiliados as af', 'af.id', '=', 'empaf.empaf_afiliado')
            ->select(
                'total_afiliados.id as ID',
                'total_afiliados.ta_cabeceradetalle as CABECERADETALLE',
                'total_afiliados.ta_totalaporte as TOTALAPORTE',
                'total_afiliados.ta_totaldeuda as TOTALDEUDA',
                'total_afiliados.ta_periodo as PERIODO',
                'af.af_nroAfiliado as NROAFILIADO',
                'af.af_cuil as CUIL',
                'af.af_apellidoNombre as NOMBRECOMPLETO'
            );

        if ($request->filled('search')) {

            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('af.af_nroAfiliado', 'LIKE', '%' . $search . '%')
                ->orWhere('af.af_cuil', 'LIKE', '%' . $search . '%')
                ->orWhere('af.af_apellidoNombre', 'LIKE', '%' . $search . '%');
            });
        }

        return $query->paginate(5);
    }


}
