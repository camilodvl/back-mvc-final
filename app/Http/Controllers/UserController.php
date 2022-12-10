<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class UserController extends Controller
{
    public function login(Request $request){
        $user = USER::where('email', $request->email)->get()[0];
        $user1 = [
            'email'=>$user->email,
            'password' => $user->password,
            'rol' => $user->rol
        ];

        if($user->email == $request->email and $user->password == $request->password){
            $jwt = JWT::encode($user1, env('JWT_SECRET'),'HS256');
            return response()->json($jwt);
        }
        else{
            return "Datos incorrectos";
        }      
        

    }

    public function validateToken(Request $request){
        $jwt=$request->header('Authorization');
        $decoded = JWT::decode($jwt, new Key(env('JWT_SECRET'), 'HS256'));
        if($decoded->rol == 'D'){
            return response()->json([
                'decano'=> '1'
            ]);
        }else{
            return response()->json([
                'decano'=> '0'
            ]);
        }
    }



}
