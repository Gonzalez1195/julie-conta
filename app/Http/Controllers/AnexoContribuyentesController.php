<?php

namespace App\Http\Controllers;

use App\Models\AnexoContribuyente;
use Exception;
use Illuminate\Http\Request;

class AnexoContribuyentesController extends Controller
{
    //
    public function addAnexoContribuyentes(Request $request)
    {
        try {
            $ventasExentas = isset($request->ventas_exentas) ? $request->ventas_exentas : 0.00;
            $ventasNoSujetas = isset($request->ventas_no_sujetas) ? $request->ventas_no_sujetas : 0.00;
            $ventasGravLocales = isset($request->ventas_gravadas_locales) ? $request->ventas_gravadas_locales : 0.00;
            $debitoFiscal = ($ventasGravLocales * 0.13);
            $ventasCuentTercNoDom = isset($request->ventas_cuenta_terc_no_domiciliados) ? $request->ventas_cuenta_terc_no_domiciliados : 0.00;
            $debitoFisVentasCuentTerc = isset($request->debito_fiscal_ventas_a_cuenta_terceros) ? $request->debito_fiscal_ventas_a_cuenta_terceros : 0.00;
            $totalVentas = ($ventasExentas + $ventasNoSujetas + $ventasGravLocales + $debitoFiscal + $ventasCuentTercNoDom + $debitoFisVentasCuentTerc);

            $anexo_contribuyentes = new AnexoContribuyente();
            $anexo_contribuyentes->fecha_emision = $request->fecha_emision;
            $anexo_contribuyentes->clase_documento = $request->clase_documento;
            $anexo_contribuyentes->tipo_documento = $request->tipo_documento;
            $anexo_contribuyentes->numero_resolucion = $request->numero_resolucion;
            $anexo_contribuyentes->serie_documento = $request->serie_documento;
            $anexo_contribuyentes->num_cont_int_del = $request->num_cont_int_del;
            $anexo_contribuyentes->num_cont_int_al = $request->num_cont_int_al;
            $anexo_contribuyentes->nit_nrc_cliente = $request->nit_nrc_cliente;
            $anexo_contribuyentes->nombre_razonsocial_denominacion = $request->nombre_razonsocial_denominacion;
            $anexo_contribuyentes->ventas_exentas = $ventasExentas;
            $anexo_contribuyentes->ventas_no_sujetas = $ventasNoSujetas;
            $anexo_contribuyentes->ventas_gravadas_locales = $ventasGravLocales;
            $anexo_contribuyentes->debito_fiscal = $debitoFiscal;
            $anexo_contribuyentes->ventas_cuenta_terc_no_domiciliados = $ventasCuentTercNoDom;
            $anexo_contribuyentes->debito_fiscal_ventas_a_cuenta_terceros = $debitoFisVentasCuentTerc;
            $anexo_contribuyentes->total_ventas = $totalVentas;
            $anexo_contribuyentes->dui_cliente = $request->dui_cliente;
            $anexo_contribuyentes->numero_anexo = $request->numero_anexo;
            // $anexo_contribuyentes->user_id = $request->user_id; // Datos de la sesion del usuario logeado.
            $anexo_contribuyentes->user_id = 1; // Datos de la sesion del usuario logeado.
            $result = $anexo_contribuyentes->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function updateAnexoContribuyentes(Request $request, $id)
    {
        try {
            $ventasExentas = isset($request->ventas_exentas) ? $request->ventas_exentas : 0.00;
            $ventasNoSujetas = isset($request->ventas_no_sujetas) ? $request->ventas_no_sujetas : 0.00;
            $ventasGravLocales = isset($request->ventas_gravadas_locales) ? $request->ventas_gravadas_locales : 0.00;
            $debitoFiscal = ($ventasGravLocales * 0.13);
            $ventasCuentTercNoDom = isset($request->ventas_cuenta_terc_no_domiciliados) ? $request->ventas_cuenta_terc_no_domiciliados : 0.00;
            $debitoFisVentasCuentTerc = isset($request->debito_fiscal_ventas_a_cuenta_terceros) ? $request->debito_fiscal_ventas_a_cuenta_terceros : 0.00;
            $totalVentas = ($ventasExentas + $ventasNoSujetas + $ventasGravLocales + $debitoFiscal + $ventasCuentTercNoDom + $debitoFisVentasCuentTerc);

            $anexo_contribuyentes = AnexoContribuyente::find($id);
            $anexo_contribuyentes->fecha_emision = $request->fecha_emision;
            $anexo_contribuyentes->clase_documento = $request->clase_documento;
            $anexo_contribuyentes->tipo_documento = $request->tipo_documento;
            $anexo_contribuyentes->numero_resolucion = $request->numero_resolucion;
            $anexo_contribuyentes->serie_documento = $request->serie_documento;
            $anexo_contribuyentes->num_cont_int_del = $request->num_cont_int_del;
            $anexo_contribuyentes->num_cont_int_al = $request->num_cont_int_al;
            $anexo_contribuyentes->nit_nrc_cliente = $request->nit_nrc_cliente;
            $anexo_contribuyentes->nombre_razonsocial_denominacion = $request->nombre_razonsocial_denominacion;
            $anexo_contribuyentes->ventas_exentas = $ventasExentas;
            $anexo_contribuyentes->ventas_no_sujetas = $ventasNoSujetas;
            $anexo_contribuyentes->ventas_gravadas_locales = $ventasGravLocales;
            $anexo_contribuyentes->debito_fiscal = $debitoFiscal;
            $anexo_contribuyentes->ventas_cuenta_terc_no_domiciliados = $ventasCuentTercNoDom;
            $anexo_contribuyentes->debito_fiscal_ventas_a_cuenta_terceros = $debitoFisVentasCuentTerc;
            $anexo_contribuyentes->total_ventas = $totalVentas;
            $anexo_contribuyentes->dui_cliente = $request->dui_cliente;
            $anexo_contribuyentes->numero_anexo = $request->numero_anexo;
            $result = $anexo_contribuyentes->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function deleteAnexoContribuyentes($id)
    {
        try {
            $anexo_contribuyentes = AnexoContribuyente::find($id);
            $result = $anexo_contribuyentes->delete();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }


}
