<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * registry
     */

    public function register(Request $request)
    {
        //Recoger post
        $json = $request->get('json');
        $params = json_decode($json, null);

        $email = (!is_null($json) && isset($params->email)) ? $params->email : null;
        $name = (!is_null($json) && isset($params->name)) ? $params->name : null;
        $password = (!is_null($json) && isset($params->password)) ? $params->password : null;
        $surname = (!is_null($json) && isset($params->surname)) ? $params->surname : null;
        $role = 'Role_User';

        if (!isnull($email) && !is_null($password) && !is_null($name)) {
            //crear usuario
            $user = new User();
            $user->email = $email;
            $user->name = $name;
            $user->surname = $name;
            $user->role = $role;

            $pwd = hash('sha256', $password);
            $user->password = $pwd;

            // Comprobar usuario duplicado
            $isset_user = User::where('email', '=', $email)->firts();

            if (count($isset_user) == 0) {
                //Guardar el usuario
                $user->save();
                $data = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'Usuario registrado correctamente'
                );
            } else {
                //Usuario duplicado
                $data = array(
                    'status' => 'error',
                    'code' => 400,
                    'message' => 'Usuario duplicado'
                );
            }

        } else {
            $data = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'Usuario no creado'
            );
        }
        return response()->json($data, 200);
    }

    /**
     * login
     */

    public function login()
    {
        echo 'login';
        die();
    }
}
