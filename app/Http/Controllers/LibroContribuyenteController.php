<?php

namespace App\Http\Controllers;

use App\Models\AnexoContribuyente;
use Exception;
use Illuminate\Http\Request;


class LibroContribuyenteController extends Controller
{
    //
    public function crearLibroContribuyente(Request $request)
    {
        try {
            $usuario = $request->usuario;
            $dateD = $request->filterDesde;
            $dateH = $request->filterHasta;

            if ( $usuario != 'null' && $dateD == null ) {

                $contribuyentes = AnexoContribuyente::where('user_id', '=', $usuario)->get();

                return response()->json($contribuyentes, 200);
            }elseif ( $usuario != 'null' && $dateD != null ) {
                $contribuyentes = AnexoContribuyente::where('user_id', '=', $usuario)
                                    ->whereBetween('fecha_emision', [$dateD, $dateH])
                                    ->get();

                return response()->json($contribuyentes, 200);
            }elseif ( $usuario == 'null' && $dateD != null ) {
                $contribuyentes = DB::table('anexo_contribuyentes')
                            ->join('users', 'users.id', '=', 'anexo_contribuyentes.user_id')
                            ->where('users.estado', 1)
                            ->whereBetween('anexo_contribuyentes.fecha_emision', [$dateD, $dateH])
                            ->get();

                return response()->json($contribuyentes, 200);
            }
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 405);
        }
    }
}
