<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \App\Libraries\jwt;
use \App\token;
use Log;

class AjaxController extends Controller
{
    //
    public function login(Request $req){
        $id = $req->input('idUser');
        $pass = $req->input('password');
        $account = DB::table('users')->where('iduser',$id)->where('password',$pass)->first();
        if(count($account) == 1){
            $token = array();
            $token["idUser"] = $id;
            $token["role"] = $account->role;
            $token["time"] = time();
            $jsonwebToken = jwt::encode($token,"ANH_DUY_OK");   
            // Set Session
            session(['token' => $jsonwebToken]);
            
            // Add Token Database
            $newtoken = new token;
            $newtoken->iduser = $id;
            $newtoken->token = $jsonwebToken;
            $newtoken->save();      
            return response()->json(['error' => false],200);
        }
        return response()->json(['error' => true,
                                 'message' => 'Login Failed !!!'],200);
    } 

    public function loginMobile(Request $req){
        $id = $req->input('idUser');
        $pass = $req->input('password');
        $account = DB::table('users')->where('iduser',$id)->where('password',$pass)->first();
        if(count($account) == 1){
            $token = array();
            $token["idUser"] = $id;
            $token["role"] = $account->role;
            $token["time"] = time();
            $jsonwebToken = jwt::encode($token,"ANH_DUY_OK");  
            
            $newtoken = new token;
            $newtoken->iduser = $id;
            $newtoken->token = $jsonwebToken;
            $newtoken->save();  
            
            $json = [
                'success' => true,
                'hasdata' => true,
                'data' => [
                    'token' => $jsonwebToken
                ]
            ];

            return response()->json($json,200);
        }

        $json = [
            'success' => false,
            'exception' => "Username or Password false",
        ];
        return response()->json($json,200);

    }
}
