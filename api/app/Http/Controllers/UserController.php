<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * registry
     */

    public function register(Request $request){
        //Recoger post
        $json = $request->get('json');
        $params = json_decode($json, null);

        $email = (!is_null($json) && isset($params->email)) ? $params->email : null;
        $name = (!is_null($json) && isset($params->name)) ? $params->name : null;
        $password = (!is_null($json) && isset($params->password)) ? $params->password : null;
        $surname = (!is_null($json) && isset($params->surname)) ? $params->surname : null;
        $role = 'Role_User';


    }

    /**
     * login
     */

    public function login(){
        echo 'login'; die();
    }
}
