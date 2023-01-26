<?php

namespace App\Http\Controllers;

use App\Models\Casilla161s;
use Exception;
use Illuminate\Http\Request;

class Casilla161sController extends Controller
{
    //
    public function addCasilla161s(Request $request)
    {
        try {
            $casilla161s = new Casilla161s();
            $casilla161s->nit_agente_efectuo_anticipo_cuenta = $request->nit_agente_efectuo_anticipo_cuenta;
            $casilla161s->fecha_emision_documento = $request->fecha_emision_documento;
            $casilla161s->serie_documento = $request->serie_documento;
            $casilla161s->numero_documento = $request->numero_documento;
            $casilla161s->monto_sujeto = $request->monto_sujeto;
            $casilla161s->monto_sujeto = $request->monto_sujeto;
            $casilla161s->dui_agente = $request->dui_agente;
            $casilla161s->numero_anexo = $request->numero_anexo;
            $casilla161s->user_id = $request->user_id; // Datos de la sesion del usuario logeado.
            $result = $casilla161s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function updateCasilla161s(Request $request, $id)
    {
        try {
            $casilla161s = Casilla161s::find($id);
            $casilla161s->nit_agente_efectuo_anticipo_cuenta = $request->nit_agente_efectuo_anticipo_cuenta;
            $casilla161s->fecha_emision_documento = $request->fecha_emision_documento;
            $casilla161s->serie_documento = $request->serie_documento;
            $casilla161s->numero_documento = $request->numero_documento;
            $casilla161s->monto_sujeto = $request->monto_sujeto;
            $casilla161s->monto_sujeto = $request->monto_sujeto;
            $casilla161s->dui_agente = $request->dui_agente;
            $casilla161s->numero_anexo = $request->numero_anexo;
            $result = $casilla161s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function deleteCasilla161s($id)
    {
        try {
            $casilla161s = Casilla161s::find($id);
            $result = $casilla161s->delete();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }


}