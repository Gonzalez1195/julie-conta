<?php

namespace App\Http\Controllers;

use App\Models\Casilla162;
use Exception;
use Illuminate\Http\Request;
use DB;

class Casilla162Controller extends Controller
{
    //
    public function addCasilla162s(Request $request)
    {
        try {
            $casilla162s = new Casilla162();
            $casilla162s->nit_agente = $request->nit_agente;
            $casilla162s->fecha_emision = $request->fecha_emision;
            $casilla162s->tipo_documento = $request->tipo_documento;
            $casilla162s->serie_documento = $request->serie_documento;
            $casilla162s->numero_documento = $request->numero_documento;
            $casilla162s->monto_sujeto = $request->monto_sujeto;
            $casilla162s->monto_retencion = $request->monto_retencion;
            $casilla162s->dui_agente = $request->dui_agente;
            $casilla162s->numero_anexo = $request->numero_anexo;

            if ( $request->user_id != "null" && $request->user_id != "" ) {
                $casilla162s->user_id = $request->user_id;
            }else {
                $casilla162s->user_id = auth()->id();
            }

            $result = $casilla162s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function updateCasilla162s(Request $request, $id)
    {
        try {
            $casilla162s = Casilla162::find($id);
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
            $casilla162s = Casilla162::find($id);
            $result = $casilla162s->delete();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function busquedaUsuario(Request $request)
    {
        try{
            if($request->id != 'null'){
                $result = Casilla162::where("user_id", "=", $request->id)->get();
            }else{
                $result = Casilla162::all();
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
                $result = DB::table('casilla162s')
                    ->whereBetween('fecha_emision', [$request->fecha1, $request->fecha2])
                    ->where('user_id', '=', $usu)
                    ->get();
            }else{
                $result = DB::table('casilla162s')
                        ->join('users', 'users.id', '=', 'casilla162s.user_id')
                        ->where('users.estado', 1)
                        ->whereBetween('casilla162s.fecha_emision', [$request->fecha1, $request->fecha2])
                        ->get();
            }

            return response()->json($result, 200);

        }catch(Exception $e){
            return response()->json($e->getMessage(), 403);
        }
    }

}
