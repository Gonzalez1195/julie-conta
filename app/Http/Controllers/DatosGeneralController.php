<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosGeneral;
use App\Models\Recomendante;
use Exception;

class DatosGeneralController extends Controller
{
    //
    public function insertDatosGen(Request $request)
    {
        try {
            $datos = new DatosGeneral();

            $datos->nombre = $request->nombres;
            $datos->fecha_nac = $request->date_nac;
            $datos->estado_civil = $request->est_civil;
            $datos->direccion = $request->dir;
            $datos->telefono = $request->tel;
            $datos->profesion_ocupacion = $request->prouocu;
            $datos->lugar_trabajo = $request->lug_trabajo;
            $datos->correo = $request->email;
            $datos->odontologo_ant = $request->odo_ant;
            $datos->odontologo_ant_tel = $request->odo_ant_tel;
            $datos->medico_personal = $request->med_per;
            $datos->medico_personal_tel = $request->med_per_tel;
            $datos->medio_enterar = $request->medio_entero;
            $datos->hospitalizado = $request->hospitalizado;
            $datos->hospitalizado_motivo = $request->motivo_hosp;
            $datos->tratamiento_actual = $request->medicado;
            $datos->tratamiento_motivo_medicamentos = $request->motivo_medicado;
            $datos->condiciones = json_encode($request->enfermedades);

            if (isset($request->recomendante) && $request->recomendante != 'null') {
                $idRecomendante = Recomendante::find($request->recomendante);
                if (isset($idRecomendante->id)) {
                    $datos->recomendante_id = $idRecomendante->id;
                }else{
                    $recomendante = new Recomendante();
                    $recomendante->nombre = $request->recomendante;
                    if ($recomendante->save()) {
                        $datos->recomendante_id = $recomendante->id;
                    }
                }
            }

            $response = $datos->save();
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function updateDatosGen(Request $request, $id)
    {
        try {
            $datos = DatosGeneral::find($id);

            $datos->nombre = $request->nombre;
            $datos->fecha_nac = $request->fecha_nac;
            $datos->estado_civil = $request->estado_civil;
            $datos->direccion = $request->direccion;
            $datos->telefono = $request->telefono;
            $datos->profesion_ocupacion = $request->profesion_ocupacion;
            $datos->lugar_trabajo = $request->lugar_trabajo;
            $datos->correo = $request->correo;
            $datos->odontologo_ant = $request->odontologo_ant;
            $datos->odontologo_ant_tel = $request->odontologo_ant_tel;
            $datos->medico_personal = $request->medico_personal;
            $datos->medico_personal_tel = $request->medico_personal_tel;
            $datos->medio_enterar = $request->medio_enterar;
            $datos->hospitalizado = $request->hospitalizado;
            $datos->hospitalizado_motivo = $request->hospitalizado_motivo;
            $datos->tratamiento_actual = $request->tratamiento_actual;
            $datos->tratamiento_motivo_medicamentos = $request->tratamiento_motivo_medicamentos;
            $datos->recomendante_id = $request->recomendante_id;

            $response = $datos->save();
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function deleteDatoGeneral($id)
    {
        try {
            $dato = DatosGeneral::find($id);
            $response = $dato->delete();

            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
