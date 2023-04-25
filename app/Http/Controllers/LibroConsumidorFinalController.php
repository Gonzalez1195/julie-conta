<?php

namespace App\Http\Controllers;

use App\Models\ConsumidorFinal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibroConsumidorFinalController extends Controller
{
    //
    public function crearLibroCF(Request $request)
    {
        try {
            $usuario = $request->usuario;
            $dateD = $request->filterDesde;
            $dateH = $request->filterHasta;

            if ( $usuario != 'null' && $dateD == null ) {

                $cf = ConsumidorFinal::where('user_id', '=', $usuario)->get();

                return response()->json($cf, 200);
            }elseif ( $usuario != 'null' && $dateD != null ) {
                $cf = ConsumidorFinal::where('user_id', '=', $usuario)
                                    ->whereBetween('fecha_emision', [$dateD, $dateH])
                                    ->get();

                return response()->json($cf, 200);
            }elseif ( $usuario == 'null' && $dateD != null ) {
                $cf = DB::table('consumidor_finals')
                            ->join('users', 'users.id', '=', 'consumidor_finals.user_id')
                            ->where('users.estado', 1)
                            ->whereBetween('consumidor_finals.fecha_emision', [$dateD, $dateH])
                            ->get();

                return response()->json($cf, 200);
            }
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 405);
        }
    }
}
