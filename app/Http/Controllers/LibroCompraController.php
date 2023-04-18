<?php

namespace App\Http\Controllers;

use App\Models\AnexoCompra;
use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibroCompraController extends Controller
{
    //
    public function generarRegistros(Request $request)
    {
        try {
            $usuario = $request->usuario;
            $dateD = $request->filterDesde;
            $dateH = $request->filterHasta;

            if ( $usuario != 'null' && $dateD == null ) {

                $compras = AnexoCompra::where('user_id', '=', $usuario)->get();

                return response()->json($compras, 200);
            }elseif ( $usuario != 'null' && $dateD != null ) {
                $compras = AnexoCompra::where('user_id', '=', $usuario)
                                    ->whereBetween('fecha_emision', [$dateD, $dateH])
                                    ->get();

                return response()->json($compras, 200);
            }elseif ( $usuario == 'null' && $dateD != null ) {
                $compras = DB::table('anexo_compras')
                            ->join('users', 'users.id', '=', 'anexo_compras.user_id')
                            ->where('users.estado', 1)
                            ->whereBetween('anexo_compras.fecha_emision', [$dateD, $dateH])
                            ->get();

                return response()->json($compras, 200);
            }
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 405);
        }
    }
}
