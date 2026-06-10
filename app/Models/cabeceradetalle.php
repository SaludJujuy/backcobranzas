<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cabeceradetalle extends Model
{
    protected $table='cabeceradetalles';
    protected $filiable=[
        'cd_fecha',
        'cd_empresaafiliados',
        'cd_obrasocial',
        'cd_empresa'
    ];

    public static function registrar_cabeceradetalle($fecha,$empresaafiliados,$obrasocial,$empresa){
        return cabeceradetalle::create([
            'cd_fecha'=>$fecha,
            'cd_empresaafiliados'=>$empresaafiliados,
            'cd_obrasocial'=>$obrasocial,
            'cd_empresa'=>$empresa
        ]);
    }

    public static function modificar_cabeceradetalle($id,$fecha,$empresaafiliados,$obrasocial,$empresa){
        $data=[
            'cd_fecha'=>$fecha,
            'cd_empresaafiliados'=>$empresaafiliados,
            'cd_obrasocial'=>$obrasocial,
            'cd_empresa'=>$empresa
        ];
        return cabeceradetalle::where('id',$id)
            ->update($data);
    }

    public static function eliminar_cabeceradetalle($id){
        return cabeceradetalle::where('id',$id)
            ->delete();
    }

    public static function listar_cabeceradetalle(Request $request){
        $query=cabeceradetalle::leftJoin('empresaafiliados as empaf','empaf.id','=','cabeceradetalle.cd_empresaafiliados')
            ->leftJoin('afiliados as af','af.id','=','empaf.empaf_afiliado')
            ->leftJoin('empresas as emp','emp.id','=','cabeceradetalles.cd_empresa')
            ->leftJoin('obra_socials as os','os.id','=','cabeceratellaes.cd_obrasocial')
            ->select(
                'af.*'
            );

        if($request->filled('search')){
            $query->where('af.af_nroAfiliado','LIKE','%'.$request->input('search').'%')
                ->orWhere('af.af_dni','LIKE','%'.$request->input('search').'%');
        }
        return $query->orderBy('id')
            ->paginate(10);
    }



    public static function listar_planillaafiliados(Request $request)
    {


        $query = cabeceradetalle::leftJoin('declaracionrecibidas as dr', 'dr.dr_cabeceradetalles', '=', 'cabeceradetalles.id')
            ->leftJoin('declaracionesperadas as de', 'de.de_cabeceradetalles', '=', 'cabeceradetalles.id')
            ->leftJoin('empresaafiliados as empaf', 'empaf.id', '=', 'cabeceradetalles.cd_empresaafiliados')
            ->leftJoin('afiliados as af', 'af.id', '=', 'empaf.empaf_afiliado')
            ->leftJoin('estado_afiliados as estaf', 'estaf.ea_afiliado', '=', 'af.id')
            ->leftJoin('planafiliados as plaf', 'plaf.pa_afiliado', '=', 'af.id')
            ->leftJoin('plans as p', 'p.id', '=', 'plaf.pa_plan')
            ->leftJoin('obra_socials as os', 'os.id', '=', 'p.pl_obraSocial')
            ->leftJoin('empresas as emp', 'emp.id', '=', 'empaf.empaf_empresa')
            ->select(
                'cabeceradetalles.*',
                'af.af_nroAfiliado as NROAFILIADO',
                'af.af_cuil as CUIL',
                'af.af_apellidoNombre as NOMBRECOMPLETO',
                'estaf.ea_estado as ESTADOAFILIADO',
                'os.os_siglas as OBRASOCIAL',
                'p.pl_razonSocial as PLAN'
            );


        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('af.af_nroAfiliado', 'LIKE', "%$search%")
                ->orWhere('af.af_dni', 'LIKE', "%$search%");
            });
        }
        return $query->orderBy('af.id', 'desc')->paginate(10);
    }
}
