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
                ->select('jobs.*','companies.company_logo')->first();
            return view('job',['job' => $job]);
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
}
