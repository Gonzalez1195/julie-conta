<?php

namespace App\Http\Controllers;

use App\Models\Casilla66;
use Exception;
use Illuminate\Http\Request;
use DB;

class Casilla66Controller extends Controller
{
    //
    public function addCasilla66s(Request $request)
    {
        try {
            $casilla66s = new Casilla66();
            $casilla66s->tipo_documento = $request->tipo_documento;
            $casilla66s->numero_nit_dui_otro = $request->numero_nit_dui_otro;
            $casilla66s->nombre_razonsocial_denominacion = $request->nombre_razonsocial_denominacion;
            $casilla66s->fecha_emision_documento = $request->fecha_emision_documento;
            $casilla66s->numero_serie_documento = $request->numero_serie_documento;
            $casilla66s->numero_documento = $request->numero_documento;
            $casilla66s->monto_operacion = $request->monto_operacion;
            $casilla66s->monto_retencion_iva = $request->monto_retencion_iva;
            $casilla66s->numero_anexo = $request->numero_anexo;

            if ( $request->user_id != "null" && $request->user_id != "" ) {
                $casilla66s->user_id = $request->user_id;
            }else {
                $casilla66s->user_id = auth()->id();
            }

            $result = $casilla66s->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function updateCasilla66s(Request $request, $id)
    {
        try {
            $casilla66s = Casilla66::find($id);
            $casilla66s->tipo_documento = $request->tipo_documento;
            $casilla66s->numero_nit_dui_otro = $request->numero_nit_dui_otro;
            $casilla66s->nombre_razonsocial_denominacion = $request->nombre_razonsocial_denominacion;
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
            $casilla66s = Casilla66::find($id);
            $result = $casilla66s->delete();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function busquedaUsuario(Request $request)
    {
        try{
            if($request->id != 'null'){
                $result = Casilla66::where("user_id", "=", $request->id)->get();
            }else{
                $result = Casilla66::all();
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
                $result = DB::table('casilla66s')
                    ->whereBetween('fecha_emision', [$request->fecha1, $request->fecha2])
                    ->where('user_id', '=', $usu)
                    ->get();
            }else{
                $result = DB::table('casilla66s')
                        ->join('users', 'users.id', '=', 'casilla66s.user_id')
                        ->where('users.estado', 1)
                        ->whereBetween('casilla66s.fecha_emision', [$request->fecha1, $request->fecha2])
                        ->get();
            }

            return response()->json($result, 200);

        }catch(Exception $e){
            return response()->json($e->getMessage(), 403);
        }
    }


}
