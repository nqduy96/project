<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Libraries\jwt;

class AdminController extends Controller
{
    public function showUser(){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            if($json->role == "admin"){
                $users = DB::table('users')->where('role','user')->get();
                return view('Admin.user',[ 'users' => $users ]);
            }
        }
        return redirect('/');
    }

    public function showCompany(){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            if($json->role == "admin"){
                $companies = DB::table('users')->where('role','com')->get();
                return view('Admin.company',[ 'companies' => $companies ]);
            }
        }
        return redirect('/');
    }
}
