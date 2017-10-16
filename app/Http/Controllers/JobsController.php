<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Libraries\jwt;

class JobsController extends Controller
{
    public function show(Request $req, $idJob){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $idUser = $json->idUser;
            $job = DB::table('jobs')->join('companies', 'jobs.id_user', '=' , 'companies.id_user')
                ->where('jobs.id',$idJob)
                ->select('jobs.*','companies.company_logo', 'companies.name')->first();
            return view('Company.job',['job' => $job, 'json' => $json]);
        }
        return redirect('/');
    }

    public function showSaved(){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $idUser = $json->idUser;
            $information = DB::table('information')->where('iduser',$idUser)->first();
            $jobs = DB::table('jobs')
                ->join('companies', 'jobs.id_user', '=' , 'companies.id_user')
                ->join('saves','jobs.id', '=', 'saves.id_job')
                ->where('saves.id_user',$idUser)
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
            return view('User.savejob',[
                'idUser' => $idUser,
                'information' => $information,
                'jobs' => $jobs,
                'ungtuyens' => $arr_ungtuyen,
                'saves' => $arr_saves ]);
        }
        return redirect('/');
    }

    public function apply(Request $req){  
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $id_user = $json->idUser;
            $id_job = $req->input('id_job');
            $check = DB::table('ungtuyens')->where('iduser', $id_user)->where('idjob',$id_job)->first();
            if(count($check) == 0){ 
                
                DB::table('ungtuyens')->insert([
                    ['iduser' => $id_user, 'idjob' => $id_job , 'trangthai' => false]
                ]);
                
                return response()->json(['message' => "Success"]);
            }
            return response()->json(['message' => "Da Duoc Apply"]);
        }
        return redirect('/');
    }

    public function save(Request $req){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $id_user = $json->idUser;
            $id_job = $req->input('id_job');
            $check = DB::table('saves')->where('id_user', $id_user)->where('id_job',$id_job)->first();
            if(count($check) == 0){ 
                DB::table('saves')->insert([
                    ['id_user' => $id_user, 'id_job' => $id_job]
                ]);            
                return response()->json(['message' => "Success"]);
            }
            return response()->json(['message' => "Da Duoc Save"]);
        }
        return redirect('/');
    }

    public function unsave(Request $req){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $id_user = $json->idUser;
            $id_job = $req->input('id_job');
            $unsave = DB::table('saves')->where('id_user', $id_user)->where('id_job',$id_job)->delete();
            return response()->json(['message' => "Da UnSave"]);
        }
        return redirect('/');
    }
}
