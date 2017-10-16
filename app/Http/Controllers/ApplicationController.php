<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Libraries\jwt;

class ApplicationController extends Controller
{
    public function showApplication(){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $idUser = $json->idUser;
            $company = DB::table('companies')->where('id_user',$idUser)->first();
            
            $applications = DB::table('jobs')
                        ->join('ungtuyens','jobs.id','=','ungtuyens.idjob')
                        ->join('information','ungtuyens.iduser','=','information.iduser')
                        ->select('information.picture','ungtuyens.iduser','jobs.title','jobs.id','ungtuyens.trangthai')
                        ->where('id_user',$idUser)
                        ->where('ungtuyens.trangthai','seen')
                        ->orWhere('ungtuyens.trangthai','0')
                        ->orderBy('ungtuyens.trangthai')
                        ->paginate(10);
            return view('Company.application',['company' => $company, 'applications' => $applications]);
        }
        return redirect('/');
    }

    public function execute(Request $req){
        if(session('token') != ""){
            $action = $req->input('action');
            $user = $req->input('user');
            $idJob = $req->input('idJob');
            
            DB::table('ungtuyens')->where('iduser',$user)
                                ->where('idjob',$idJob)
                                ->update(['trangthai' => $action]);

            return response()->json(['message' => "success"]);
        }
        return redirect('/');
    }

    public function showSelectedApplication(){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $idUser = $json->idUser;
            $company = DB::table('companies')->where('id_user',$idUser)->first();
            
            $applications = DB::table('jobs')
                        ->join('ungtuyens','jobs.id','=','ungtuyens.idjob')
                        ->join('information','ungtuyens.iduser','=','information.iduser')
                        ->select('information.picture','ungtuyens.iduser','jobs.title','jobs.id','ungtuyens.trangthai')
                        ->where('id_user',$idUser)
                        ->where('ungtuyens.trangthai','select')
                        ->orWhere('ungtuyens.trangthai','0')
                        ->orderBy('ungtuyens.trangthai')
                        ->paginate(10);
            return view('Company.selectedApplication',['company' => $company, 'applications' => $applications]);
        }
        return redirect('/');
    }
}
