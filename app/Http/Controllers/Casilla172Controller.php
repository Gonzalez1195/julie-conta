<?php

namespace App\Http\Controllers;

use App\Models\Casilla172;
use Illuminate\Http\Request;

class Casilla172Controller extends Controller
{
    //
    public function addCasilla172(Request $request)
    {
        try {
            $casilla172 = new Casilla172();
            $casilla172->nit_sujeto = $request->nit_sujeto;
            $casilla172->fecha_emision = $request->fecha_emision;
            $casilla172->tipo_documento = $request->tipo_documento;
            $casilla172->serie_documento = $request->serie_documento;
            $casilla172->numero_resolucion = $request->numero_resolucion;
            $casilla172->numero_documento = $request->numero_documento;
            $casilla172->monto_sujeto = $request->monto_sujeto;
            $casilla172->monto_retencion = $request->monto_retencion;
            $casilla172->dui_sujeto = $request->dui_sujeto;
            $casilla172->numero_anexo = $request->numero_anexo;
            $casilla172->user_id = $request->user_id;
            $result = $casilla172->save();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function updateCasilla172(Request $request, $id)
    {
        try {
            $casilla172 = Casilla172::find($id);
            $casilla172->nit_sujeto = $request->nit_sujeto;
            $casilla172->fecha_emision = $request->fecha_emision;
            $casilla172->tipo_documento = $request->tipo_documento;
            $casilla172->serie_documento = $request->serie_documento;
            $casilla172->numero_resolucion = $request->numero_resolucion;
            $casilla172->numero_documento = $request->numero_documento;
            $casilla172->monto_sujeto = $request->monto_sujeto;
            $casilla172->monto_retencion = $request->monto_retencion;
            $casilla172->dui_sujeto = $request->dui_sujeto;
            $casilla172->numero_anexo = $request->numero_anexo;
            $casilla172->user_id = $request->user_id;
            $result = $casilla172->save();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function deleteCasilla172($id)
    {
        try {
            $casilla171s = Casilla172::find($id);
            $result = $casilla171s->delete();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }
}
