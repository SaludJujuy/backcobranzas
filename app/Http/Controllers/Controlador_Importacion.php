<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Afiliado;
use Illuminate\Support\Facades\DB;

class Controlador_Importacion extends Controller
{
    public function preview(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:xlsx,xls,csv'
        ]);

        $archivo = $request->file('archivo');

        $spreadsheet = IOFactory::load($archivo->getPathname());

        $sheet = $spreadsheet->getActiveSheet();

        $rows = $sheet->toArray();

        $encabezados = array_shift($rows);

        $datos = [];

        foreach($rows as $fila){

            if(empty(array_filter($fila))){
                continue;
            }

            $datos[] = array_combine(
                $encabezados,
                $fila
            );
        }

        return response()->json([
            'success' => true,
            'columnas' => $encabezados,
            'data' => $datos
        ]);
    }

    public function guardar(Request $request)
    {
        $datos = $request->input('datos');

        $importados = 0;
        $omitidos = 0;

        DB::beginTransaction();

        try {

            foreach ($datos as $fila) {

                $dni = trim($fila['DNI']);

                $existe = Afiliado::where('af_dni', $dni)->exists();

                if ($existe) {
                    $omitidos++;
                    continue;
                }

                Afiliado::create([
                    'af_dni' => $dni,
                    'af_apellidoNombre' => strtoupper($fila['APELLIDO_NOMBRE']),
                    'af_nroAfiliado' => $fila['NRO_AFILIADO']
                ]);

                $importados++;
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Importación finalizada',
                'importados' => $importados,
                'omitidos' => $omitidos
            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
