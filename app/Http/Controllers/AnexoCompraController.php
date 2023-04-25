<?php

namespace App\Http\Controllers;

use App\Models\AnexoCompra;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnexoCompraController extends Controller
{
    //
    public function addAnexoCompra(Request $request)
    {
        try {
            // Calculando credito fiscal y Total de compras
            $comprasIntExentas = isset($request->compras_internas_exentas) ? $request->compras_internas_exentas : 0.00;
            $internacionesExenNoSujetas = isset($request->internaciones_exentas_no_sujetas) ? $request->internaciones_exentas_no_sujetas : 0.00;
            $importacionesExenNoSujetas = isset($request->importaciones_exentas_no_sujetas) ? $request->importaciones_exentas_no_sujetas : 0.00;
            $comprasInternasGrav = isset($request->compras_internas_gravadas) ? $request->compras_internas_gravadas : 0.00;
            $internacionesGravadasBienes = isset($request->internaciones_gravadas_bienes) ? $request->internaciones_gravadas_bienes : 0.00;
            $importacionesGravBienes = isset($request->importaciones_gravadas_bienes) ? $request->importaciones_gravadas_bienes : 0.00;
            $importacionesGravServicios = isset($request->importaciones_gravadas_servicios) ? $request->importaciones_gravadas_servicios : 0.00;

            $creditoFiscal = (($comprasInternasGrav + $internacionesGravadasBienes + $importacionesGravBienes + $importacionesGravServicios) * 0.13);
            $totalCompras = ($comprasIntExentas + $internacionesExenNoSujetas + $importacionesExenNoSujetas + $comprasInternasGrav + $internacionesGravadasBienes + $importacionesGravBienes + $importacionesGravServicios + $creditoFiscal);

            $anexo_compras = new AnexoCompra();
            $anexo_compras->fecha_emision = $request->fecha_emision;
            $anexo_compras->clase_documento = $request->clase_documento;
            $anexo_compras->tipo_documento = $request->tipo_documento;
            $anexo_compras->numero_documento = $request->numero_documento;
            $anexo_compras->nit_nrc_proveedor = $request->nit_nrc_proveedor;
            $anexo_compras->nombre_proveedor = $request->nombre_proveedor;
            $anexo_compras->compras_internas_exentas = $comprasIntExentas;
            $anexo_compras->internaciones_exentas_no_sujetas = $internacionesExenNoSujetas;
            $anexo_compras->importaciones_exentas_no_sujetas = $importacionesExenNoSujetas;
            $anexo_compras->compras_internas_gravadas = $comprasInternasGrav;
            $anexo_compras->internaciones_gravadas_bienes = $internacionesGravadasBienes;
            $anexo_compras->importaciones_gravadas_bienes = $importacionesGravBienes;
            $anexo_compras->importaciones_gravadas_servicios = $importacionesGravServicios;
            $anexo_compras->credito_fiscal = $creditoFiscal;
            $anexo_compras->total_compras = $totalCompras;
            $anexo_compras->dui_proveedor = $request->dui_proveedor;
            $anexo_compras->numero_anexo = $request->numero_anexo;

            if ( $request->user_id != "null" && $request->user_id != "" ) {
                $anexo_compras->user_id = $request->user_id;
            }else {
                $anexo_compras->user_id = auth()->id();
            }

            $result = $anexo_compras->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function updateAnexoCompra(Request $request, $id)
    {
        try {
            // Calculando credito fiscal y Total de compras
            $comprasIntExentas = isset($request->compras_internas_exentas) ? $request->compras_internas_exentas : 0.00;
            $internacionesExenNoSujetas = isset($request->internaciones_exentas_no_sujetas) ? $request->internaciones_exentas_no_sujetas : 0.00;
            $importacionesExenNoSujetas = isset($request->importaciones_exentas_no_sujetas) ? $request->importaciones_exentas_no_sujetas : 0.00;
            $comprasInternasGrav = isset($request->compras_internas_gravadas) ? $request->compras_internas_gravadas : 0.00;
            $internacionesGravadasBienes = isset($request->internaciones_gravadas_bienes) ? $request->internaciones_gravadas_bienes : 0.00;
            $importacionesGravBienes = isset($request->importaciones_gravadas_bienes) ? $request->importaciones_gravadas_bienes : 0.00;
            $importacionesGravServicios = isset($request->importaciones_gravadas_servicios) ? $request->importaciones_gravadas_servicios : 0.00;

            $creditoFiscal = (($comprasInternasGrav + $internacionesGravadasBienes + $importacionesGravBienes + $importacionesGravServicios) * 0.13);
            $totalCompras = ($comprasIntExentas + $internacionesExenNoSujetas + $importacionesExenNoSujetas + $comprasInternasGrav + $internacionesGravadasBienes + $importacionesGravBienes + $importacionesGravServicios + $creditoFiscal);

            $anexo_compras = AnexoCompra::find($id);
            $anexo_compras->fecha_emision = $request->fecha_emision;
            $anexo_compras->clase_documento = $request->clase_documento;
            $anexo_compras->tipo_documento = $request->tipo_documento;
            $anexo_compras->numero_documento = $request->numero_documento;
            $anexo_compras->nit_nrc_proveedor = $request->nit_nrc_proveedor;
            $anexo_compras->nombre_proveedor = $request->nombre_proveedor;
            $anexo_compras->compras_internas_exentas = $comprasIntExentas;
            $anexo_compras->internaciones_exentas_no_sujetas = $internacionesExenNoSujetas;
            $anexo_compras->importaciones_exentas_no_sujetas = $importacionesExenNoSujetas;
            $anexo_compras->compras_internas_gravadas = $comprasInternasGrav;
            $anexo_compras->internaciones_gravadas_bienes = $internacionesGravadasBienes;
            $anexo_compras->importaciones_gravadas_bienes = $importacionesGravBienes;
            $anexo_compras->importaciones_gravadas_servicios = $importacionesGravServicios;
            $anexo_compras->credito_fiscal = $creditoFiscal;
            $anexo_compras->total_compras = $totalCompras;
            $anexo_compras->dui_proveedor = $request->dui_proveedor;
            $anexo_compras->numero_anexo = $request->numero_anexo;

            if ( $request->user_id != "null" && $request->user_id != "" ) {
                $anexo_compras->user_id = $request->user_id;
            }else {
                $anexo_compras->user_id = auth()->id();
            }

            $result = $anexo_compras->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function deleteAnexoCompra($id)
    {
        try {
            $anexo_compras = AnexoCompra::find($id);
            $result = $anexo_compras->delete();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function busquedaUsuario(Request $request)
    {
        try{
            if($request->id != 'null'){
                $consumidores = AnexoCompra::where("user_id", "=", $request->id)->get();
            }else{
                $consumidores = AnexoCompra::all();
            }

            return response()->json($consumidores, 200);
        }catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function BusquedaFechaUsu(Request $request)
    {
        try{
            $usu = $request->usuario;

            if( $usu != 'null'){
                $cf = DB::table('anexo_compras')
                    ->whereBetween('fecha_emision', [$request->fecha1, $request->fecha2])
                    ->where('user_id', '=', $usu)
                    ->get();
            }else{
                $cf = DB::table('anexo_compras')
                        ->join('users', 'users.id', '=', 'anexo_compras.user_id')
                        ->where('users.estado', 1)
                        ->whereBetween('anexo_compras.fecha_emision', [$request->fecha1, $request->fecha2])
                        ->get();
            }

            return response()->json($cf, 200);

        }catch(Exception $e){
            return response()->json($e->getMessage(), 403);
        }
    }


}
