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
            $anexo_contribuyentes->ventas_exentas = $request->ventas_exentas;
            $anexo_contribuyentes->ventas_no_sujetas = $request->ventas_no_sujetas;
            $anexo_contribuyentes->ventas_gravadas_locales = $request->ventas_gravadas_locales;
            $anexo_contribuyentes->debito_fiscal = $request->debito_fiscal;
            $anexo_contribuyentes->ventas_cuenta_terc_no_domiciliados = $request->ventas_cuenta_terc_no_domiciliados;
            $anexo_contribuyentes->debito_fiscal_ventas_a_cuenta_terceros = $request->debito_fiscal_ventas_a_cuenta_terceros;
            $anexo_contribuyentes->total_ventas = $request->total_ventas;
            $anexo_contribuyentes->dui_cliente = $request->dui_cliente;
            $anexo_contribuyentes->numero_anexo = $request->numero_anexo;

            if ( $request->user_id != "null" && $request->user_id != "" ) {
                $anexo_contribuyentes->user_id = $request->user_id;
            }else {
                $anexo_contribuyentes->user_id = auth()->id();
            }

            $result = $anexo_contribuyentes->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function updateAnexoContribuyentes(Request $request, $id)
    {
        try {
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
            $anexo_contribuyentes->ventas_exentas = $request->ventas_exentas;
            $anexo_contribuyentes->ventas_no_sujetas = $request->ventas_no_sujetas;
            $anexo_contribuyentes->ventas_gravadas_locales = $request->ventas_gravadas_locales;
            $anexo_contribuyentes->debito_fiscal = $request->debito_fiscal;
            $anexo_contribuyentes->ventas_cuenta_terc_no_domiciliados = $request->ventas_cuenta_terc_no_domiciliados;
            $anexo_contribuyentes->debito_fiscal_ventas_a_cuenta_terceros = $request->debito_fiscal_ventas_a_cuenta_terceros;
            $anexo_contribuyentes->total_ventas = $request->total_ventas;
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

    public function busquedaUsuario(Request $request)
    {
        try{
            if($request->id != 'null'){
                $contribuyentes = AnexoContribuyente::where("user_id", "=", $request->id)->get();
            }else{
                $contribuyentes = AnexoContribuyente::all();
            }

            return response()->json($contribuyentes, 200);
        }catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function BusquedaFechaUsu(Request $request)
    {
        try{
            $usu = $request->usuario;

            if( $usu != 'null'){
                $contribuyentes = DB::table('anexo_contribuyentes')
                    ->whereBetween('fecha_emision', [$request->fecha1, $request->fecha2])
                    ->where('user_id', '=', $usu)
                    ->get();
            }else{
                $contribuyentes = DB::table('anexo_contribuyentes')
                        ->join('users', 'users.id', '=', 'anexo_contribuyentes.user_id')
                        ->where('users.estado', 1)
                        ->whereBetween('anexo_contribuyentes.fecha_emision', [$request->fecha1, $request->fecha2])
                        ->get();
            }

            return response()->json($contribuyentes, 200);

        }catch(Exception $e){
            return response()->json($e->getMessage(), 403);
        }
    }


}
