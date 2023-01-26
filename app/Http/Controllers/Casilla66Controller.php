<?php

namespace App\Http\Controllers;

use App\Models\Casilla66s;
use Exception;
use Illuminate\Http\Request;

class Casilla66sController extends Controller
{
    //
    public function addCasilla66s(Request $request)
    {
        try {
            $casilla66s = new Casilla66s();
            $casilla66s->tipo_documento = $request->tipo_documento;
            $casilla66s->numero_nit_dui_otro = $request->numero_nit_dui_otro;
            $casilla66s->tipo_documento = $request->nombre_razonsocial_denominacion;
            $casilla66s->numero_resolucion = $request->numero_resolucion;
            $casilla66s->fecha_emision_documento = $request->fecha_emision_documento;
            $casilla66s->numero_serie_documento = $request->numero_serie_documento;
            $casilla66s->numero_documento = $request->numero_documento;
            $casilla66s->monto_operacion = $request->monto_operacion;
            $casilla66s->monto_retencion_iva = $request->monto_retencion_iva;
            $casilla66s->numero_anexo = $request->numero_anexo;
            $casilla66s->user_id = $request->user_id; // Datos de la sesion del usuario logeado.
            $result = $casilla66s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function updateCasilla66s(Request $request, $id)
    {
        try {
            $casilla66s = Casilla66s::find($id);
            $casilla66s->tipo_documento = $request->tipo_documento;
            $casilla66s->numero_nit_dui_otro = $request->numero_nit_dui_otro;
            $casilla66s->tipo_documento = $request->nombre_razonsocial_denominacion;
            $casilla66s->numero_resolucion = $request->numero_resolucion;
            $casilla66s->fecha_emision_documento = $request->fecha_emision_documento;
            $casilla66s->numero_serie_documento = $request->numero_serie_documento;
            $casilla66s->numero_documento = $request->numero_documento;
            $casilla66s->monto_operacion = $request->monto_operacion;
            $casilla66s->monto_retencion_iva = $request->monto_retencion_iva;
            $casilla66s->numero_anexo = $request->numero_anexo;
            $result = $casilla66s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function deleteCasilla66s($id)
    {
        try {
            $casilla66s = Casilla66s::find($id);
            $result = $casilla66s->delete();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }


}