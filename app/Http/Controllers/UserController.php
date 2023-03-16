<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

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

            // Asignando rol
            $user->assignRole($request->tipoUsu);

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

            // Asignando rol
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $user->assignRole($request->tipoUsu);

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

    public function createTypeUsuario(Request $request)
    {
        try {
            $type = $request->tipo;

            $role = Role::create([
                'name' => $type
            ]);

            return response()->json($role, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

}
