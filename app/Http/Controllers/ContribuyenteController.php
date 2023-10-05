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
        try {
            if ( $request->type == "nit" ) {
                if ($request->num != '' && isset($request->num)) {
                    $contribuyentes = DB::table('contribuyentes')
                                ->where('nrc_nit', 'like', '%'. $request->num .'%')
                                ->whereNotNull('nrc_nit')
                                ->limit(100)
                                ->get();
                } else {
                    $contribuyentes = DB::table('contribuyentes')
                                ->whereNotNull('nrc_nit')
                                ->limit(100)
                                ->get();
                }
            }else {
                if ($request->num != '' && isset($request->num)) {
                    $contribuyentes = DB::table('contribuyentes')
                                ->where('dui', 'like', '%'. $request->num .'%')
                                ->whereNotNull('dui')
                                ->limit(100)
                                ->get();
                } else {
                    $contribuyentes = DB::table('contribuyentes')
                                ->whereNotNull('dui')
                                ->limit(100)
                                ->get();
                }
            }

            return response()->json($contribuyentes, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 405);
        }
    }

}
