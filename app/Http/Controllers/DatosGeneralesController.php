<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosGenerales;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class DatosGeneralesController extends Controller
{
    //
    public function addDatosGen(Request $request)
    {
        try {
            $datosGen = new DatosGenerales();
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            if ($user->save()) {
                $idUser = $user->id;

                $datosGen->telefono = $request->telefono;
                $datosGen->estado = '1';
                $datosGen->user_id = $idUser;
                $result = $datosGen->save();

                return response()->json($result, 200);
            }
            return response()->json(false, 403);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }


    public function updateDatosGen(Request $request, $id)
    {
        try {
            $datosGen = DatosGenerales::find($id);
            $user = User::find($id);

            $user->name = $request->name;
            $user->email = $request->email;
            if (isset($request->password)) {
                $user->password = Hash::make($request->password);
            }

            if ($user->save()) {
                $idUser = $user->id;

                $datosGen->telefono = $request->telefono;
                $datosGen->user_id = $idUser;
                $result = $datosGen->save();

                return response()->json($result, 200);
            }
            return response()->json(false, 403);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function eliminar($id)
    {
        try {
            $datosGen = DatosGenerales::find($id);
            $datosGen->estado = '0';
            $result = $datosGen->save();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json(false, 403);
        }
    }


}
