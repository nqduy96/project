<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Libraries\jwt;
use Yajra\Datatables\Facades\Datatables; 

class EducationController extends Controller
{
    public function show(){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $checkToken = DB::table('tokens')->where('token',$token)->get();
            if(count($checkToken) == 1){
                $idUser = $json->idUser;
                $education = DB::table('education')->where('idUser',$idUser)->get();
                $information = DB::table('information')->where('iduser',$idUser)->first();

                return View('User.education',[ 'idUser' => $idUser,
                                        'educations' => $education,
                                        'information' => $information]);
            }
        }
        return redirect('/');
    }

    public function delete(Request $req){
        $idEdu = $req->input("idEdu");       
        $query = DB::table('education')->where('id',$idEdu)->delete();
        return "true";
        
    }

    public function insert(Request $req){
        $major = $req->input("major");
        $year = $req->input("year");
        $school = $req->input("school");
        $content = $req->input("content");
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $idUser = $json->idUser;
            $query = DB::table('education')->insert([
                ['iduser' => $idUser,  'year' => $year, 'major' => $major, 'school' => $school, 'content' => $content],   
            ]);
            return "true";
        }
        return "false";
        
    }

    public function edit(Request $req){
        $idEdu = $req->input("idEdu");
        $major = $req->input("major");
        $year = $req->input("year");
        $school = $req->input("school");
        $content = $req->input("content");
        if(session('token') != ""){
            $query = DB::table('education')->where("id",$idEdu)->update(['year' => $year, 'major' => $major, 'school' => $school, 'content' => $content]);
            return "true";
        }
        return "false";
        
    }
}
