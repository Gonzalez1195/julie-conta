<?php

namespace App\Http\Controllers;

use App\Models\Casilla171;
use Exception;
use Illuminate\Http\Request;

class Casilla171Controller extends Controller
{
//
    public function addCasilla171(Request $request)
    {
        try {
            $casilla171s = new Casilla171();
            $casilla171s->nit_sujeto = $request->nit_sujeto;
            $casilla171s->fecha_emision = $request->fecha_emision;
            $casilla171s->tipo_documento = $request->tipo_documento;
            $casilla171s->numero_resolucion = $request->numero_resolucion;
            $casilla171s->serie_documento = $request->serie_documento;
            $casilla171s->numero_documento = $request->numero_documento;
            $casilla171s->monto_sujeto = $request->monto_sujeto;
            $casilla171s->monto_anticipo_cuenta = $request->monto_anticipo_cuenta;
            $casilla171s->dui_sujeto = $request->dui_sujeto;
            $casilla171s->numero_anexo = $request->numero_anexo;
            $casilla171s->user_id = $request->user_id; // Datos de la sesion del usuario logeado.
            $result = $casilla171s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function updateCasilla171(Request $request, $id)
    {
        try {
            $casilla171s = Casilla171::find($id);
            $casilla171s->nit_sujeto = $request->nit_sujeto;
            $casilla171s->fecha_emision = $request->fecha_emision;
            $casilla171s->tipo_documento = $request->tipo_documento;
            $casilla171s->numero_resolucion = $request->numero_resolucion;
            $casilla171s->serie_documento = $request->serie_documento;
            $casilla171s->numero_documento = $request->numero_documento;
            $casilla171s->monto_sujeto = $request->monto_sujeto;
            $casilla171s->monto_anticipo_cuenta = $request->monto_anticipo_cuenta;
            $casilla171s->dui_sujeto = $request->dui_sujeto;
            $casilla171s->numero_anexo = $request->numero_anexo;
            $result = $casilla171s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function deleteCasilla171($id)
    {
        try {
            $casilla171s = Casilla171::find($id);
            $result = $casilla171s->delete();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }


}
