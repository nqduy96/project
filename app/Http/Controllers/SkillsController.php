<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Libraries\jwt;
use Yajra\Datatables\Facades\Datatables; 

class SkillsController extends Controller
{
    public function show(){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $checkToken = DB::table('tokens')->where('token',$token)->get();
            if(count($checkToken) == 1){
                $idUser = $json->idUser;
                $education = DB::table('skills')->where('idUser',$idUser)->get();
                $information = DB::table('information')->where('iduser',$idUser)->first();

                return View('skilluser',[ 'idUser' => $idUser,
                                        'skills' => $education,
                                        'information' => $information]);
            }
        }
        return redirect('/');
    }

    public function delete(Request $req){
        $idSkill = $req->input("idSkill");       
        $query = DB::table('skills')->where('id',$idSkill)->delete();
        return "true";
        
    }

    public function insert(Request $req){
        $name = $req->input("name");
        $percent = $req->input("percent");
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $idUser = $json->idUser;
            $query = DB::table('skills')->insert([
                ['iduser' => $idUser,  'name' => $name, 'percent' => $percent]   
            ]);
            return "true";
        }
        return "false";
        
    }

    public function edit(Request $req){
        $idSkill = $req->input("idSkill");
        $name = $req->input("name");
        $percent = $req->input("percent");
        if(session('token') != ""){
            $query = DB::table('skills')->where("id",$idSkill)->update(['name' => $name, 'percent' => $percent]);
            return "true";
        }
        return "false";
        
    }
}
