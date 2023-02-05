<?php

namespace App\Http\Controllers;

use App\Models\ConsumidorFinal;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ConsumidorFinalController extends Controller
{
    //
    public function addConsumidorFinal(Request $request)
    {
        try {
            $consumidorFinal = new ConsumidorFinal();
            $consumidorFinal->fecha_emision = $request->fecha_emision;
            $consumidorFinal->clase_documento = $request->clase_documento;
            $consumidorFinal->tipo_documento = $request->tipo_documento;
            $consumidorFinal->numero_resolucion = $request->numero_resolucion;
            $consumidorFinal->serie_documento = $request->serie_documento;
            $consumidorFinal->num_cont_int_del = $request->num_cont_int_del;
            $consumidorFinal->num_cont_int_al = $request->num_cont_int_al;
            $consumidorFinal->num_documento_del = $request->num_documento_del;
            $consumidorFinal->num_documento_al = $request->num_documento_al;
            $consumidorFinal->num_maquina_registradora = $request->num_maquina_registradora;
            $consumidorFinal->ventas_exentas = isset($request->ventas_exentas) ? $request->ventas_exentas : 0.00;
            $consumidorFinal->ventas_int_exentas_no_suj_proporcionalidad = isset($request->ventas_int_exentas_no_suj_proporcionalidad) ? $request->ventas_int_exentas_no_suj_proporcionalidad : 0.00;
            $consumidorFinal->ventas_no_sujetas = isset($request->ventas_no_sujetas) ? $request->ventas_no_sujetas : 0.00;
            $consumidorFinal->ventas_gravadas_locales = isset($request->ventas_gravadas_locales) ? $request->ventas_gravadas_locales : 0.00;
            $consumidorFinal->exp_adentro_area_ca = isset($request->exp_adentro_area_ca) ? $request->exp_adentro_area_ca : 0.00;
            $consumidorFinal->exp_fuera_area_ca = isset($request->exp_fuera_area_ca) ? $request->exp_fuera_area_ca : 0.00;
            $consumidorFinal->exp_servicio = isset($request->exp_servicio) ? $request->exp_servicio : 0.00;
            $consumidorFinal->ventas_zonas_francas_dpa = isset($request->ventas_zonas_francas_dpa) ? $request->ventas_zonas_francas_dpa : 0.00;
            $consumidorFinal->ventas_cuenta_terc_no_domiciliados = isset($request->ventas_cuenta_terc_no_domiciliados) ? $request->ventas_cuenta_terc_no_domiciliados : 0.00;
            $consumidorFinal->total_ventas = isset($request->total_ventas) ? $request->total_ventas : 0.00;
            $consumidorFinal->numero_anexo = $request->numero_anexo;
            // $consumidorFinal->user_id = $request->user_id; // Datos de la sesion del usuario logeado.
            $consumidorFinal->user_id = 1;
            $result = $consumidorFinal->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function updateConsumidorFinal(Request $request, $id)
    {
        try {
            $consumidorFinal = ConsumidorFinal::find($id);
            $consumidorFinal->fecha_emision = $request->fecha_emision;
            $consumidorFinal->clase_documento = $request->clase_documento;
            $consumidorFinal->tipo_documento = $request->tipo_documento;
            $consumidorFinal->numero_resolucion = $request->numero_resolucion;
            $consumidorFinal->serie_documento = $request->serie_documento;
            $consumidorFinal->num_cont_int_del = $request->num_cont_int_del;
            $consumidorFinal->num_cont_int_al = $request->num_cont_int_al;
            $consumidorFinal->num_documento_del = $request->num_documento_del;
            $consumidorFinal->num_documento_al = $request->num_documento_al;
            $consumidorFinal->num_maquina_registradora = $request->num_maquina_registradora;
            $consumidorFinal->ventas_exentas = isset($request->ventas_exentas) ? $request->ventas_exentas : 0.00;
            $consumidorFinal->ventas_int_exentas_no_suj_proporcionalidad = isset($request->ventas_int_exentas_no_suj_proporcionalidad) ? $request->ventas_int_exentas_no_suj_proporcionalidad : 0.00;
            $consumidorFinal->ventas_no_sujetas = isset($request->ventas_no_sujetas) ? $request->ventas_no_sujetas : 0.00;
            $consumidorFinal->ventas_gravadas_locales = isset($request->ventas_gravadas_locales) ? $request->ventas_gravadas_locales : 0.00;
            $consumidorFinal->exp_adentro_area_ca = isset($request->exp_adentro_area_ca) ? $request->exp_adentro_area_ca : 0.00;
            $consumidorFinal->exp_fuera_area_ca = isset($request->exp_fuera_area_ca) ? $request->exp_fuera_area_ca : 0.00;
            $consumidorFinal->exp_servicio = isset($request->exp_servicio) ? $request->exp_servicio : 0.00;
            $consumidorFinal->ventas_zonas_francas_dpa = isset($request->ventas_zonas_francas_dpa) ? $request->ventas_zonas_francas_dpa : 0.00;
            $consumidorFinal->ventas_cuenta_terc_no_domiciliados = isset($request->ventas_cuenta_terc_no_domiciliados) ? $request->ventas_cuenta_terc_no_domiciliados : 0.00;
            $consumidorFinal->total_ventas = isset($request->total_ventas) ? $request->total_ventas : 0.00;
            $consumidorFinal->numero_anexo = $request->numero_anexo;
            // $consumidorFinal->user_id = $request->user_id; // Datos de la sesion del usuario logeado.
            $consumidorFinal->user_id = 1;
            $result = $consumidorFinal->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function deleteConsumidorFinal($id)
    {
        try {
            $consumidorFinal = ConsumidorFinal::find($id);
            $result = $consumidorFinal->delete();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function busquedaUsuarioCf(Request $request)
    {
        try{
            $consumidores = ConsumidorFinal::where("user_id", "=", $request->id)->get();

            return response()->json($consumidores, 200);
        }catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }


}
