<?php

namespace App\Http\Controllers;

use App\Models\Casilla169;
use Exception;
use Illuminate\Http\Request;

class Casilla169sController extends Controller
{
    //
    public function addCasilla169s(Request $request)
    {
        try {
            $casilla169s = new Casilla169();
            $casilla169s->nit_sujeto = $request->nit_sujeto;
            $casilla169s->fecha_emision = $request->fecha_emision;
            $casilla169s->tipo_documento = $request->tipo_documento;
            $casilla169s->numero_resolucion = $request->numero_resolucion;
            $casilla169s->serie_documento = $request->serie_documento;
            $casilla169s->numero_documento = $request->numero_documento;
            $casilla169s->monto_sujeto = $request->monto_sujeto;
            $casilla169s->monto_percepcion = $request->monto_percepcion;
            $casilla169s->dui_sujeto = $request->dui_sujeto;
            $casilla169s->numero_anexo = $request->numero_anexo;
            $casilla169s->user_id = $request->user_id; // Datos de la sesion del usuario logeado.
            $result = $casilla169s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function updateCasilla169s(Request $request, $id)
    {
        try {
            $casilla169s = Casilla169::find($id);
            $casilla169s->nit_sujeto = $request->nit_sujeto;
            $casilla169s->fecha_emision = $request->fecha_emision;
            $casilla169s->tipo_documento = $request->tipo_documento;
            $casilla169s->numero_resolucion = $request->numero_resolucion;
            $casilla169s->serie_documento = $request->serie_documento;
            $casilla169s->numero_documento = $request->numero_documento;
            $casilla169s->monto_sujeto = $request->monto_sujeto;
            $casilla169s->monto_percepcion = $request->monto_percepcion;
            $casilla169s->dui_sujeto = $request->dui_sujeto;
            $casilla169s->numero_anexo = $request->numero_anexo;
            $result = $casilla169s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function deleteCasilla169s($id)
    {
        try {
            $casilla169s = Casilla169::find($id);
            $result = $casilla169s->delete();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }


}
