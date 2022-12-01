<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\DatosGeneral;
use Exception;

class CitaController extends Controller
{
    //
    public function addCitas(Request $request)
    {
        try {
            $pacienteId = $request->paciente;
            $data = new Cita();
            $response = null;
            if (isset($pacienteId) && $pacienteId != 'null') {
                $datoGeneral = DatosGeneral::find($pacienteId);
                if (isset($datoGeneral->id)) {
                    $data->fecha_cita = $request->fecha_cita;
                    $data->datos_generales_id = $pacienteId;
                }else{
                    $datosGen = new DatosGeneral();
                    $datosGen->nombre = $pacienteId;
                    $datosGen->telefono = $request->tel;
                    $datosGen->correo = $request->email;
                    if ($datosGen->save()) {
                        $data->fecha_cita = $request->fecha_cita;
                        $data->datos_generales_id = $datosGen->id;
                    }
                }
                $response = $data->save();
            }
            return response()->json($response);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    }


}
