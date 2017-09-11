<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Libraries\jwt;
use Yajra\Datatables\Facades\Datatables;


class ExperiencesController extends Controller
{
    public function show(){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $checkToken = DB::table('tokens')->where('token',$token)->get();
            if(count($checkToken) == 1){
                $idUser = $json->idUser;
                $experiences = DB::table('experiences')->where('idUser',$idUser)->get();
                $information = DB::table('information')->where('iduser',$idUser)->first();

                return View('experienceuser',[ 'idUser' => $idUser,
                                        'experiences' => $experiences,
                                        'information' => $information]);
            }
        }
        return redirect('/');
    }

    public function delete(Request $req){
        $idEx = $req->input("idEx");       
        $query = DB::table('experiences')->where('id',$idEx)->delete();
        return "true";
        
    }

    public function insert(Request $req){
        $position = $req->input("position");
        $year = $req->input("year");
        $company = $req->input("company");
        $content = $req->input("content");
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $idUser = $json->idUser;
            $query = DB::table('experiences')->insert([
                ['iduser' => $idUser,  'year' => $year, 'position' => $position, 'company' => $company, 'content' => $content],   
            ]);
            return "true";
        }
        return "false";
        
    }

    public function edit(Request $req){
        $idEx = $req->input("idEx");
        $position = $req->input("position");
        $year = $req->input("year");
        $company = $req->input("company");
        $content = $req->input("content");
        if(session('token') != ""){
            $query = DB::table('experiences')->where("id",$idEx)->update(['year' => $year, 'position' => $position, 'company' => $company, 'content' => $content]);
            return "true";
        }
        return "false";
        
    }
}
