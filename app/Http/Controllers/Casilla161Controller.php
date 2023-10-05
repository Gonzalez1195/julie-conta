<?php

namespace App\Http\Controllers;

use App\Models\Casilla161;
use Exception;
use Illuminate\Http\Request;
use DB;

class Casilla161Controller extends Controller
{
    //
    public function addCasilla161s(Request $request)
    {
        try {
            $casilla161s = new Casilla161();
            $casilla161s->nit_agente_efectuo_anticipo_cuenta = $request->nit_agente_efectuo_anticipo_cuenta;
            $casilla161s->fecha_emision_documento = $request->fecha_emision_documento;
            $casilla161s->serie_documento = $request->serie_documento;
            $casilla161s->numero_documento = $request->numero_documento;
            $casilla161s->monto_sujeto = $request->monto_sujeto;
            $casilla161s->monto_anticipo_cuenta_iva = $request->monto_anticipo_cuenta_iva;
            $casilla161s->dui_agente = $request->dui_agente;
            $casilla161s->numero_anexo = $request->numero_anexo;

            if ( $request->user_id != "null" && $request->user_id != "" ) {
                $casilla161s->user_id = $request->user_id;
            }else {
                $casilla161s->user_id = auth()->id();
            }

            $result = $casilla161s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function updateCasilla161s(Request $request, $id)
    {
        try {
            $casilla161s = Casilla161::find($id);
            $casilla161s->nit_agente_efectuo_anticipo_cuenta = $request->nit_agente_efectuo_anticipo_cuenta;
            $casilla161s->fecha_emision_documento = $request->fecha_emision_documento;
            $casilla161s->serie_documento = $request->serie_documento;
            $casilla161s->numero_documento = $request->numero_documento;
            $casilla161s->monto_sujeto = $request->monto_sujeto;
            $casilla161s->monto_anticipo_cuenta_iva = $request->monto_anticipo_cuenta_iva;
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
            $casilla161s = Casilla161::find($id);
            $result = $casilla161s->delete();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function busquedaUsuario(Request $request)
    {
        try{
            if($request->id != 'null'){
                $result = Casilla161::where("user_id", "=", $request->id)->get();
            }else{
                $result = Casilla161::all();
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
                $result = DB::table('casilla161s')
                    ->whereBetween('fecha_emision_documento', [$request->fecha1, $request->fecha2])
                    ->where('user_id', '=', $usu)
                    ->get();
            }else{
                $result = DB::table('casilla161s')
                        ->join('users', 'users.id', '=', 'casilla161s.user_id')
                        ->where('users.estado', 1)
                        ->whereBetween('casilla161s.fecha_emision_documento', [$request->fecha1, $request->fecha2])
                        ->get();
            }

            return response()->json($result, 200);

        }catch(Exception $e){
            return response()->json($e->getMessage(), 403);
        }
    }

}
