<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recomendante;
use Exception;

class RecomendanteController extends Controller
{
    //
    public function insertRecomendante(Request $request)
    {
        try {
            $datos = new Recomendante();

            $datos->nombre = $request->nombre;
            $response = $datos->save();
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function updateRecomendante(Request $request, $id)
    {
        try {
            $datos = Recomendante::find($id);

            $datos->nombre = $request->nombre;
            $response = $datos->save();
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function deleteRecomendante($id)
    {
        try {
            $datos = Recomendante::find($id);

            $response = $datos->delete();
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
