<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Contribuyente;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContribuyenteController extends Controller
{
    //
    public function contribuyentesAdd(Request $request)
    {
        try {
            $contribuyente = new Contribuyente();

            $contribuyente->nombre = $request->name;
            $contribuyente->nrc_nit = $request->nrc_nit;
            $contribuyente->dui = $request->dui;
            $response = $contribuyente->save();

            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 405);
        }
    }

    public function contribuyentesUpdate(Request $request, $id)
    {
        try {
            $contribuyente = Contribuyente::find($id);

            $contribuyente->nombre = $request->name;
            $contribuyente->nrc_nit = $request->nrc_nit;
            $contribuyente->dui = $request->dui;
            $response = $contribuyente->save();

            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 405);
        }
    }

    public function contribuyenteDelete($id)
    {
        try {

            $contribuyente = Contribuyente::find($id);
            $response = $contribuyente->delete();

            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 405);
        }
    }

    public function searchContribuyente(Request $request)
    {
        // return response()->json($request->term, 200);
        try {
            $contribuyentes = DB::table('contribuyentes')
                            ->where('nrc_nit', 'like', $request->term .'%')
                            ->get();

            $response = [];
            foreach ($contribuyentes as $key => $contribuyente) {
                $response['nombre'] = $contribuyente->nombre;
                $response['nrc_nit'] = $contribuyente->nrc_nit;
                $response['dui'] = $contribuyente->dui;
            }

            return response()->json($$response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 405);
        }
    }

}
