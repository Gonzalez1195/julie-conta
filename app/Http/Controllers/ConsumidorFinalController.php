<?php

namespace App\Http\Controllers;

use App\Models\ConsumidorFinal;
use Exception;
use Illuminate\Http\Request;

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
            $consumidorFinal->ventas_exentas = $request->ventas_exentas;
            $consumidorFinal->ventas_int_exentas_no_suj_proporcionalidad = $request->ventas_int_exentas_no_suj_proporcionalidad;
            $consumidorFinal->ventas_no_sujetas = $request->ventas_no_sujetas;
            $consumidorFinal->ventas_gravadas_locales = $request->ventas_gravadas_locales;
            $consumidorFinal->exp_adentro_area_ca = $request->exp_adentro_area_ca;
            $consumidorFinal->exp_fuera_area_ca = $request->exp_fuera_area_ca;
            $consumidorFinal->exp_servicio = $request->exp_servicio;
            $consumidorFinal->ventas_zonas_francas_dpa = $request->ventas_zonas_francas_dpa;
            $consumidorFinal->ventas_cuenta_terc_no_domiciliados = $request->ventas_cuenta_terc_no_domiciliados;
            $consumidorFinal->total_ventas = $request->total_ventas;
            $consumidorFinal->numero_anexo = $request->numero_anexo;
            $consumidorFinal->user_id = $request->user_id; // Datos de la sesion del usuario logeado.
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
            $consumidorFinal->ventas_exentas = $request->ventas_exentas;
            $consumidorFinal->ventas_int_exentas_no_suj_proporcionalidad = $request->ventas_int_exentas_no_suj_proporcionalidad;
            $consumidorFinal->ventas_no_sujetas = $request->ventas_no_sujetas;
            $consumidorFinal->ventas_gravadas_locales = $request->ventas_gravadas_locales;
            $consumidorFinal->exp_adentro_area_ca = $request->exp_adentro_area_ca;
            $consumidorFinal->exp_fuera_area_ca = $request->exp_fuera_area_ca;
            $consumidorFinal->exp_servicio = $request->exp_servicio;
            $consumidorFinal->ventas_zonas_francas_dpa = $request->ventas_zonas_francas_dpa;
            $consumidorFinal->ventas_cuenta_terc_no_domiciliados = $request->ventas_cuenta_terc_no_domiciliados;
            $consumidorFinal->total_ventas = $request->total_ventas;
            $consumidorFinal->numero_anexo = $request->numero_anexo;
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


}
