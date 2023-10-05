<?php

namespace App\Http\Controllers;

use App\Models\Casilla108;
use Exception;
use Illuminate\Http\Request;
use DB;

class Casilla108Controller extends Controller
{
    //
    public function addCasilla108s(Request $request)
    {
        try {
            $casilla108s = new Casilla108();
            $casilla108s->nit_nrc_mandante = $request->nit_nrc_mandante;
            $casilla108s->nombre_razon_social_denominacion = $request->nombre_razon_social_denominacion;
            $casilla108s->fecha_emision = $request->fecha_emision;
            $casilla108s->tipo_documento = $request->tipo_documento;
            $casilla108s->serie_documento = $request->serie_documento;
            $casilla108s->numero_resolucion = $request->numero_resolucion;
            $casilla108s->numero_documento = $request->numero_documento;
            $casilla108s->monto_operacion = $request->monto_operacion;
            $casilla108s->iva_operacion = $request->iva_operacion;
            $casilla108s->num_serie_comprobante_liquidacion = $request->num_serie_comprobante_liquidacion;
            $casilla108s->num_resolucion_comprobante_liquidacion = $request->num_resolucion_comprobante_liquidacion;
            $casilla108s->num_comprobante_liquidacion = $request->num_comprobante_liquidacion;
            $casilla108s->fecha_emision_comprobante_liquidacion = $request->fecha_emision_comprobante_liquidacion;
            $casilla108s->dui_cliente = $request->dui_cliente;
            $casilla108s->numero_anexo = $request->numero_anexo;

            if ( $request->user_id != "null" && $request->user_id != "" ) {
                $casilla108s->user_id = $request->user_id;
            }else {
                $casilla108s->user_id = auth()->id();
            }

            $result = $casilla108s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function updateCasilla108s(Request $request, $id)
    {
        try {
            $casilla108s = Casilla108::find($id);
            $casilla108s->nit_nrc_mandante = $request->nit_nrc_mandante;
            $casilla108s->nombre_razon_social_denominacion = $request->nombre_razon_social_denominacion;
            $casilla108s->fecha_emision = $request->fecha_emision;
            $casilla108s->tipo_documento = $request->tipo_documento;
            $casilla108s->serie_documento = $request->serie_documento;
            $casilla108s->numero_resolucion = $request->numero_resolucion;
            $casilla108s->numero_documento = $request->numero_documento;
            $casilla108s->monto_operacion = $request->monto_operacion;
            $casilla108s->iva_operacion = $request->iva_operacion;
            $casilla108s->num_serie_comprobante_liquidacion = $request->num_serie_comprobante_liquidacion;
            $casilla108s->num_resolucion_comprobante_liquidacion = $request->num_resolucion_comprobante_liquidacion;
            $casilla108s->num_comprobante_liquidacion = $request->num_comprobante_liquidacion;
            $casilla108s->fecha_emision_comprobante_liquidacion = $request->fecha_emision_comprobante_liquidacion;
            $casilla108s->dui_cliente = $request->dui_cliente;
            $casilla108s->numero_anexo = $request->numero_anexo;
            $result = $casilla108s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function deleteCasilla108s($id)
    {
        try {
            $casilla108s = Casilla108::find($id);
            $result = $casilla108s->delete();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function busquedaUsuario(Request $request)
    {
        try{
            if($request->id != 'null'){
                $result = Casilla108::where("user_id", "=", $request->id)->get();
            }else{
                $result = Casilla108::all();
            }

            return response()->json($result, 200);
        }catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function BusquedaFechaUsu(Request $request)
    {
        try{
            $usu = $request->usuario;

            if( $usu != 'null'){
                $result = DB::table('casilla108s')
                    ->whereBetween('fecha_emision', [$request->fecha1, $request->fecha2])
                    ->where('user_id', '=', $usu)
                    ->get();
            }else{
                $result = DB::table('casilla108s')
                        ->join('users', 'users.id', '=', 'casilla108s.user_id')
                        ->where('users.estado', 1)
                        ->whereBetween('casilla108s.fecha_emision', [$request->fecha1, $request->fecha2])
                        ->get();
            }

            return response()->json($result, 200);

        }catch(Exception $e){
            return response()->json($e->getMessage(), 403);
        }
    }

}
