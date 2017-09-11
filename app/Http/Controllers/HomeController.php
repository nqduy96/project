<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Libraries\jwt;

class HomeController extends Controller
{
    public function logout(){
        $token = session('token');

        $deleteToken = DB::table('tokens')->where('token',$token)->delete();
        session()->flush();
        return redirect('/');
    }

    public function show(){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $checkToken = DB::table('tokens')->where('token',$token)->get();
            if(count($checkToken) == 1){
                $idUser = $json->idUser;
                $information = DB::table('information')->where('iduser',$idUser)->first();
                $jobs = DB::table('jobs')->join('companies', 'jobs.id_company', '=' , 'companies.id_company')
                                        ->select('jobs.*','companies.company_logo')->get();
                                        
                return View('homeuser',[ 'idUser' => $idUser,
                                        'information' => $information,
                                        'jobs' => $jobs]);
            }
        }
        return redirect('/');
    }
}
