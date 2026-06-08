<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cabeceradetalle extends Model
{
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

    public static function listar_cabeceradetalle($request){
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

    public static function listar_planillaafiliados($request)
    {
        $query = cabeceradetalle::query()
            ->leftJoin('declaraionrecibidas as dr', 'dr.dr_cabeceradetalle', '=', 'cabeceradetalle.id')
            ->leftJoin('declaracionesperadas as de', 'de.de_cabeceradetalle', '=', 'cabeceradetalle.id')
            ->leftJoin('empresaafiliados as empaf', 'empaf.id', '=', 'cabeceradetalle.cd_empresaafiliados')
            ->leftJoin('afiliados as af', 'af.id', '=', 'empaf.empaf_afiliado')
            ->leftJoin('estado_afiliados as estaf', 'estaf.ea_afiliado', '=', 'af.id')
            ->leftJoin('planafiliados as plaf', 'plaf.pa_afiliado', '=', 'af.id')
            ->leftJoin('plans as p', 'p.id', '=', 'plaf.pa_plan')
            ->leftJoin('obra_socials as os', 'os.id', '=', 'p.pl_obraSocial')
            ->leftJoin('empresas as emp', 'emp.id', '=', 'empaf.empaf_empresa')
            ->select(
                'af.id',
                'emp.emp_razonsocial as razonSocial',
                'af.af_nroAfiliado as nroAfiliado',
                'af.af_apellidoNombre as apellidoNombre',
                'estaf.ea_estado as estadoAfiliado',
                'os.os_siglas as obraSocial',
                'p.pl_razonsocial as plan',
                'dr.dr_declaracionjurada as declaracionJurada',
                'dr.dr_cct as cct',
                'dr.dr_aportecontribucionrecibida as aporteRecibido',
                'de.de_aportecontribucionesperada as aporteEsperado'
            )
            ->groupBy(
                'af.id',
                'emp.emp_razonsocial',
                'af.af_nroAfiliado',
                'af.af_apellidoNombre',
                'estaf.ea_estado',
                'os.os_siglas',
                'p.pl_razonsocial',
                'dr.dr_declaracionjurada',
                'dr.dr_cct',
                'dr.dr_aportecontribucionrecibida',
                'de.de_aportecontribucionesperada'
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
