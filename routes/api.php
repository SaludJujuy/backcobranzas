<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controlador_Usuario;
use App\Http\Controllers\Controlador_Afiliado;
use App\Http\Controllers\Controlador_Empresa;
use App\Http\Controllers\Controlador_AfiliadoEstado;
use App\Http\Controllers\Controlador_CabeceraDetalle;
use App\Http\Controllers\Controlador_Convenio;
use App\Http\Controllers\Controlador_ConvenioValor;
use App\Http\Controllers\Controlador_DeclaracionEsperada;
use App\Http\Controllers\Controlador_DeclaracionRecibida;
use App\Http\Controllers\Controlador_EmpresaAfiliado;
use App\Http\Controllers\Controlador_ObraSocial;
use App\Http\Controllers\Controlador_Plan;
use App\Http\Controllers\Controlador_PlanAfiliado;
use App\Http\Controllers\Controlador_TotalAfiliado;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/user/insert',[Controlador_Usuario::class,'registrar_usuario']);
Route::post('/user/login',[Controlador_Usuario::class,'login']);

Route::post('/afiliado/insert',[Controlador_Afiliado::class,'registrar_afiliado']);
Route::post('/afiliado/update',[Controlador_Afiliado::class,'modificar_afiliado']);
Route::post('/afiliado/delete',[Controlador_Afiliado::class,'eliminar_afiliado']);
Route::get('/afiliado/list',[Controlador_Afiliado::class,'listar_afiliados']);

Route::post('/empresa/insert',[Controlador_Empresa::class,'registrar_empresa']);
Route::post('/empresa/update',[Controlador_Empresa::class,'modificar_empresa']);
Route::post('/empresa/delete',[Controlador_Empresa::class,'eliminar_empresa']);
Route::get('/empresa/list',[Controlador_Empresa::class,'listar_empresa']);

Route::post('/obrasocial/insert',[Controlador_ObraSocial::class,'registrar_obrasocial']);
Route::post('/obrasocial/update',[Controlador_ObraSocial::class,'modificar_obrasocial']);
Route::post('/obrasocial/delete',[Controlador_ObraSocial::class,'eliminar_obrasocial']);
Route::get('/obrasocial/list',[Controlador_ObraSocial::class,'listar_obrasocial']);

Route::post('/plan/insert',[Controlador_Plan::class,'registrar_plan']);
Route::post('/plan/update',[Controlador_Plan::class,'modificar_plan']);
Route::post('/plan/delete',[Controlador_Plan::class,'eliminar_plan']);
Route::get('/plan/list',[Controlador_Plan::class,'listar_plan']);

Route::post('/convenio/insert',[Controlador_Convenio::class,'registrar_convenio']);
Route::post('/convenio/update',[Controlador_Convenio::class,'modificar_convenio']);
Route::post('/convenio/delete',[Controlador_Convenio::class,'eliminar_convenio']);
Route::get('/convenio/list',[Controlador_Convenio::class,'listar_convenio']);

Route::post('/conveniovalor/insert',[Controlador_ConvenioValor::class,'registrar_conveniovalor']);
Route::post('/conveniovalor/update',[Controlador_ConvenioValor::class,'modificar_conveniovalor']);
Route::post('/conveniovalor/delete',[Controlador_ConvenioValor::class,'eliminar_conveniovalor']);
Route::get('/conveniovalor/list',[Controlador_ConvenioValor::class,'listar_conveniovalor']);

Route::post('/declaracionesperada/insert',[Controlador_DeclaracionEsperada::class,'registrar_declaracionesperada']);
Route::post('/declaracionesperada/update',[Controlador_DeclaracionEsperada::class,'modificar_declaracionesperada']);
Route::post('/declaracionesperada/delete',[Controlador_DeclaracionEsperada::class,'eliminar_declaracionesperada']);
Route::get('/declaracionesperada/list',[Controlador_DeclaracionEsperada::class,'listar_declaracionesperada']);

Route::post('/declaracionrecibida/insert',[Controlador_DeclaracionRecibida::class,'registrar_declaracionrecibida']);
Route::post('/declaracionrecibida/update',[Controlador_DeclaracionRecibida::class,'modificar_declaracionrecibida']);
Route::post('/declaracionrecibida/delete',[Controlador_DeclaracionRecibida::class,'eliminar_declaracionrecibida']);
Route::get('/declaracionrecibida/list',[Controlador_DeclaracionRecibida::class,'listar_declaracionrecibida']);

Route::post('/cabeceradetalle/insert',[Controlador_CabeceraDetalle::class,'registrar_cabeceradetalle']);
Route::post('/cabeceradetalle/update',[Controlador_CabeceraDetalle::class,'modificar_cabeceradetalle']);
Route::post('/cabeceradetalle/delete',[Controlador_CabeceraDetalle::class,'eliminar_cabeceradetalle']);
Route::get('/cabeceradetalle/list',[Controlador_CabeceraDetalle::class,'listar_cabeceradetalle']);
Route::get('/cabeceradetalle/planillaafiliados',[Controlador_CabeceraDetalle::class,'listar_planillaafiliados']);

Route::post('/planafiliado/insert',[Controlador_PlanAfiliado::class,'registrar_planafiliado']);
Route::post('/planafiliado/update',[Controlador_PlanAfiliado::class,'modificar_planafiliado']);
Route::post('/planafiliado/delete',[Controlador_PlanAfiliado::class,'eliminar_planafiliado']);
Route::get('/planafiliado/list',[Controlador_PlanAfiliado::class,'listar_planafiliado']);

Route::post('/afiliadoestado/insert',[Controlador_AfiliadoEstado::class,'registrar_afiliadoestado']);
Route::post('/afiliadoestado/update',[Controlador_AfiliadoEstado::class,'modificar_afiliadoestado']);
Route::post('/afiliadoestado/delete',[Controlador_AfiliadoEstado::class,'eliminar_afiliadoestado']);
Route::get('/afiliadoestado/list',[Controlador_afiliadoestado::class,'listar_afiliadoestado']);

Route::post('/empresaafiliado/insert',[Controlador_EmpresaAfiliado::class,'registrar_empresaafiliado']);
Route::post('/empresaafiliado/update',[Controlador_EmpresaAfiliado::class,'modificar_empresaafiliado']);
Route::post('/empresaafiliado/delete',[Controlador_EmpresaAfiliado::class,'eliminar_empresaafiliado']);
Route::get('/empresaafiliado/list',[Controlador_EmpresaAfiliado::class,'listar_empresaafiliado']);

Route::post('/totalafiliado/insert',[Controlador_TotalAfiliado::class,'registrar_totalafiliado']);
Route::post('/totalafiliado/update',[Controlador_TotalAfiliado::class,'modificar_totalafiliado']);
Route::post('/totalafiliado/delete',[Controlador_TotalAfiliado::class,'eliminar_totalafiliado']);
Route::get('/totalafiliado/list',[Controlador_TotalAfiliado::class,'listar_totalafiliado']);
