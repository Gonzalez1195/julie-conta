<?php

namespace App\Http\Controllers;

use App\Models\Casilla162s;
use Exception;
use Illuminate\Http\Request;

class Casilla162sController extends Controller
{
    //
    public function addCasilla162s(Request $request)
    {
        try {
            $casilla162s = new Casilla162s();
            $casilla162s->nit_agente = $request->nit_agente;
            $casilla162s->fecha_emision = $request->fecha_emision;
            $casilla162s->tipo_documento = $request->tipo_documento;
            $casilla162s->serie_documento = $request->serie_documento;
            $casilla162s->numero_documento = $request->numero_documento;
            $casilla162s->monto_sujeto = $request->monto_sujeto;
            $casilla162s->monto_retencion = $request->monto_retencion;
            $casilla162s->dui_agente = $request->dui_agente;
            $casilla162s->numero_anexo = $request->numero_anexo;
            $casilla162s->user_id = $request->user_id; // Datos de la sesion del usuario logeado.
            $result = $casilla162s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function updateCasilla162s(Request $request, $id)
    {
        try {
            $casilla161s = Casilla162s::find($id);
            $casilla162s->nit_agente = $request->nit_agente;
            $casilla162s->fecha_emision = $request->fecha_emision;
            $casilla162s->tipo_documento = $request->tipo_documento;
            $casilla162s->serie_documento = $request->serie_documento;
            $casilla162s->numero_documento = $request->numero_documento;
            $casilla162s->monto_sujeto = $request->monto_sujeto;
            $casilla162s->monto_retencion = $request->monto_retencion;
            $casilla162s->dui_agente = $request->dui_agente;
            $casilla162s->numero_anexo = $request->numero_anexo;
            $result = $casilla162s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function deleteCasilla162s($id)
    {
        try {
            $casilla162s = Casilla162s::find($id);
            $result = $casilla162s->delete();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }


}