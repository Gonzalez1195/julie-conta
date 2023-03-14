<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use app\Models\LibroContribuyente;


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

                $compras = LibroContribuyente::where('user_id', '=', $usuario)->get();

                return response()->json($compras, 200);
            }elseif ( $usuario != 'null' && $dateD != null ) {
                $compras = LibroContribuyente::where('user_id', '=', $usuario)
                                    ->whereBetween('fecha_emision', [$dateD, $dateH])
                                    ->get();

                return response()->json($compras, 200);
            }elseif ( $usuario == 'null' && $dateD != null ) {
                $compras = LibroContribuyente::whereBetween('fecha_emision', [$dateD, $dateH])->get();

                return response()->json($compras, 200);
            }

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 405);
        }
    }
}
