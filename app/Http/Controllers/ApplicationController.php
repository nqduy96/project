<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Libraries\jwt;

class ApplicationController extends Controller
{
    public function show(){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $idUser = $json->idUser;
            $company = DB::table('companies')->where('id_user',$idUser)->first();
            
            return view('applicationCom',['company' => $company]);
        }
        return redirect('/');
    }
}
