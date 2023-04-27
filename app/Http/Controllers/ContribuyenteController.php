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

    public function searchContribuyenteNrc(Request $request)
    {
        try {
            if ( is_array($request->term) ) {
                foreach ($request->term as $name) {
                    $contribuyentes = DB::table('contribuyentes')
                                ->where('nrc_nit', 'like', '%' .$name. '%')
                                ->get();

                    return response()->json($contribuyentes, 200);
                }
            }else {
                $contribuyentes = DB::table('contribuyentes')
                                ->where('nrc_nit', 'like', $request->term. '%')
                                ->get();

                return response()->json($contribuyentes, 200);
            }
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 405);
        }
    }

    public function ContribuyenteId($num)
    {
        try {
            $contribuyente = Contribuyente::where('nrc_nit', '=', $num)
                                            ->orWhere('dui', '=', $num)
                                            ->get();

            return response()->json($contribuyente, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 405);
        }
    }

    public function searchContribuyenteDui(Request $request)
    {
        try {
            if ( is_array($request->term) ) {
                foreach ($request->term as $name) {
                    $contribuyentes = DB::table('contribuyentes')
                                ->where('dui', 'like', '%' .$name. '%')
                                ->get();

                    return response()->json($contribuyentes, 200);
                }
            }else {
                $contribuyentes = DB::table('contribuyentes')
                                ->where('dui', 'like', '%' .$request->term. '%')
                                ->get();

                return response()->json($contribuyentes, 200);
            }
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 405);
        }
    }

}
