<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Libraries\jwt;

class TokensController extends Controller
{
    public function checkLogin(){
        $token = session('token');
        return ($token != "") ? redirect("/home") : View('login');       
    }

    public function checkLoginMobile(Request $req){
        $token = $req->input('token');
        $check = DB::table('tokens')->where('token',$token)->first();
        if(count($check)){
            $json = [
                'success' => true,
                'hasdata' => true,
                'data' => [
                    'username' => $check->iduser
                ]
            ];
            return response()->json($json,200);
        }
        $json = [
            'success' => false,
            'exception' => "Don't have token",
        ];
        return response()->json($json,200);
    }
}
