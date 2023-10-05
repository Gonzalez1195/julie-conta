<?php

namespace App\Http\Controllers;

use App\Models\Casilla163;
use Exception;
use Illuminate\Http\Request;
use DB;

class Casilla163Controller extends Controller
{
    //
    public function addCasilla163s(Request $request)
    {
        try {
            $casilla163s = new Casilla163();
            $casilla163s->nit_agente = $request->nit_agente;
            $casilla163s->fecha_emision = $request->fecha_emision;
            $casilla163s->tipo_documento = $request->tipo_documento;
            $casilla163s->serie_documento = $request->serie_documento;
            $casilla163s->numero_documento = $request->numero_documento;
            $casilla163s->monto_sujeto = $request->monto_sujeto;
            $casilla163s->monto_percepcion = $request->monto_percepcion;
            $casilla163s->dui_agente = $request->dui_agente;
            $casilla163s->numero_anexo = $request->numero_anexo;

            if ( $request->user_id != "null" && $request->user_id != "" ) {
                $casilla163s->user_id = $request->user_id;
            }else {
                $casilla163s->user_id = auth()->id();
            }

            $result = $casilla163s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function updateCasilla163s(Request $request, $id)
    {
        try {
            $casilla163s = Casilla163::find($id);
            $casilla163s->nit_agente = $request->nit_agente;
            $casilla163s->fecha_emision = $request->fecha_emision;
            $casilla163s->tipo_documento = $request->tipo_documento;
            $casilla163s->serie_documento = $request->serie_documento;
            $casilla163s->numero_documento = $request->numero_documento;
            $casilla163s->monto_sujeto = $request->monto_sujeto;
            $casilla163s->monto_percepcion = $request->monto_percepcion;
            $casilla163s->dui_agente = $request->dui_agente;
            $casilla163s->numero_anexo = $request->numero_anexo;
            $result = $casilla163s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function deleteCasilla163s($id)
    {
        try {
            $casilla163s = Casilla163::find($id);
            $result = $casilla163s->delete();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function busquedaUsuario(Request $request)
    {
        try{
            if($request->id != 'null'){
                $result = Casilla163::where("user_id", "=", $request->id)->get();
            }else{
                $result = Casilla163::all();
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
                $result = DB::table('casilla163s')
                    ->whereBetween('fecha_emision', [$request->fecha1, $request->fecha2])
                    ->where('user_id', '=', $usu)
                    ->get();
            }else{
                $result = DB::table('casilla163s')
                        ->join('users', 'users.id', '=', 'casilla163s.user_id')
                        ->where('users.estado', 1)
                        ->whereBetween('casilla163s.fecha_emision', [$request->fecha1, $request->fecha2])
                        ->get();
            }

            return response()->json($result, 200);

        }catch(Exception $e){
            return response()->json($e->getMessage(), 403);
        }
    }


}
