<?php

namespace App\Http\Controllers;

use App\Models\Casilla170;
use Exception;
use Illuminate\Http\Request;

class Casilla170Controller extends Controller
{
    //
}
    public function addCasilla170(Request $request)
    {
        try {
            $casilla170s = new Casilla170();
            $casilla170s->nit_sujeto = $request->nit_sujeto;
            $casilla170s->fecha_emision = $request->fecha_emision;
            $casilla170s->tipo_documento = $request->tipo_documento;
            $casilla170s->numero_resolucion = $request->numero_resolucion;
            $casilla170s->serie_documento = $request->serie_documento;
            $casilla170s->numero_documento = $request->numero_documento;
            $casilla170s->monto_sujeto = $request->monto_sujeto;
            $casilla170s->monto_retencion = $request->monto_retencion;
            $casilla170s->dui_sujeto = $request->dui_sujeto;
            $casilla170s->numero_anexo = $request->numero_anexo;
            $casilla170s->user_id = $request->user_id; // Datos de la sesion del usuario logeado.
            $result = $casilla169s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function updateCasilla170(Request $request, $id)
    {
        try {
            $casilla170s = Casilla170::find($id);
            $casilla170s->nit_sujeto = $request->nit_sujeto;
            $casilla170s->fecha_emision = $request->fecha_emision;
            $casilla170s->tipo_documento = $request->tipo_documento;
            $casilla170s->numero_resolucion = $request->numero_resolucion;
            $casilla170s->serie_documento = $request->serie_documento;
            $casilla170s->numero_documento = $request->numero_documento;
            $casilla170s->monto_sujeto = $request->monto_sujeto;
            $casilla170s->monto_retencion = $request->monto_retencion;
            $casilla170s->dui_sujeto = $request->dui_sujeto;
            $casilla170s->numero_anexo = $request->numero_anexo;
            $result = $casilla170s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function deleteCasilla170($id)
    {
        try {
            $casilla170s = Casilla170::find($id);
            $result = $casilla170s->delete();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }


}