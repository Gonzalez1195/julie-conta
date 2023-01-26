<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function addUser(Request $request)
    {
        try {
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->telefono = $request->telefono;
            $user->estado = '1';
            $result = $user->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function updateUser(Request $request, $id)
    {
        try {
            $user = User::find($id);

            $user->name = $request->name;
            $user->email = $request->email;
            if (isset($request->password)) {
                $user->password = Hash::make($request->password);
            }
            $user->telefono = $request->telefono;
            $result = $user->save();

            return response()->json($result, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 403);
        }
    }

    public function eliminarUser($id)
    {
        try {
            $user = User::find($id);
            $user->estado = '0';
            $result = $user->save();

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json(false, 403);
        }
    }

}
