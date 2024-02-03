<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use DB;

class PlanillaController extends Controller
{
    //
    public function planillaIngresos(Request $request)
    {
        try {
            if (date('j') > 15) {
                $empleados = DB::table('empleados')
                    ->leftJoin('planilla_empleados', 'empleados.id', '=', 'planilla_empleados.empleado_id')
                    ->leftJoin('planillas', 'planillas.id', '=', 'planilla_empleados.planilla_id')
                    ->whereMonth('planillas.created_at', now()->month)
                    ->whereYear('planillas.created_at', now()->year)
                    ->whereDay('planillas.created_at', '>', 15)
                    ->get();
            }else{
                $empleados = DB::table('empleados')
                    ->leftJoin('planilla_empleados', 'empleados.id', '=', 'planilla_empleados.empleado_id')
                    ->leftJoin('planillas', 'planillas.id', '=', 'planilla_empleados.planilla_id')
                    ->whereMonth('planillas.created_at', now()->month)
                    ->whereYear('planillas.created_at', now()->year)
                    ->whereDay('planillas.created_at', '<=', 15)
                    ->get();
            }

            return response()->json($empleados, 200);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
