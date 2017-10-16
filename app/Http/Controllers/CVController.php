<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Libraries\jwt;

class CVController extends Controller
{
    public function show(Request $req, $idUser){
        $checkUser = DB::table('users')->where('iduser', $idUser)->get();
        if(count($checkUser) == 1){
            $information = DB::table('information')->where('iduser', $idUser)->first();
            $skills = DB::table('skills')->where('iduser', $idUser)->get();
            $experiences = DB::table('experiences')->where('iduser', $idUser)->get();
            $educations = DB::table('education')->where('iduser', $idUser)->get();

            return View('User.templateCV.' . $information->name_cv, [  'iduser' => $idUser,
                                'information' => $information,
                                'skills' => $skills, 
                                'experiences' => $experiences,
                                'educations' => $educations]);
        }
    }

    public function showTemplate(){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token,"ANH_DUY_OK",true);
            $idUser = $json->idUser;
            $information = DB::table('information')->where('iduser', $idUser)->first();
            $templates =  DB::table('templatecvs')->get();
            return View('User.templatecv',['idUser' => $idUser, 'information' => $information , 'templates' => $templates]);
        }
        return redirect("/");
    }

    public function demoTemplate($iduser,$nametemplate){
        if(session('token') != ""){
            $query_user = DB::table('users')->where('iduser', $iduser)->first();
            $query_nametemplate = DB::table('templatecvs')->where('name_cv',$nametemplate)->first();
            
            if(count($query_user) == 1 && count($query_nametemplate) == 1){
                $information = DB::table('information')->where('iduser', $iduser)->first();
                $skills = DB::table('skills')->where('iduser', $iduser)->get();
                $experiences = DB::table('experiences')->where('iduser', $iduser)->get();
                $educations = DB::table('education')->where('iduser', $iduser)->get();
                return view('User.templateCV.' . $nametemplate,[
                    'iduser' => $iduser,
                    'information' => $information,
                    'skills' => $skills, 
                    'experiences' => $experiences,
                    'educations' => $educations
                    ]);
            }
            
            return ;
        }
        return redirect("/");
    }
}
