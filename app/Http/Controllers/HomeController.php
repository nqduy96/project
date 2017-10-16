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
                if($json->role == "user"){
                    $information = DB::table('information')->where('iduser',$idUser)->first();
                    $jobs = DB::table('jobs')->join('companies', 'jobs.id_user', '=' , 'companies.id_user')
                                            ->select('jobs.*','companies.company_logo', 'companies.name as company_name')->get();                        
                    $ungtuyens = DB::table('ungtuyens')->where('iduser',$idUser)->get();
                    $saves = DB::table('saves')->where('id_user',$idUser)->get();
                    $arr_ungtuyen = array();
                    foreach($ungtuyens as $ungtuyen){
                        $arr_ungtuyen[] = $ungtuyen->idjob;
                    }
                    $arr_saves = array();
                    foreach($saves as $save){
                        $arr_saves[] = $save->id_job;
                    }
                    return View('User/home',[ 'idUser' => $idUser,
                                        'information' => $information,
                                        'jobs' => $jobs,
                                        'ungtuyens' => $arr_ungtuyen,
                                        'saves' => $arr_saves ]);
                }
                if($json->role == "com"){
                    $company = DB::table('companies')->where('id_user',$idUser)->first();
                    $jobs = DB::table('jobs')->join('companies', 'jobs.id_user', '=' , 'companies.id_user')
                                            ->select('jobs.*','companies.company_logo', 'companies.name as company_name')->get();                        
                    return View('Company/home',[ 'idUser' => $idUser,
                                        'company' => $company,
                                        'jobs' => $jobs]);
                }
                if($json->role == "admin"){
                    return View('Admin/home');
                }
            }
        }
        return redirect('/');
    }
}
