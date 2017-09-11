<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Libraries\jwt;

class ProfileController extends Controller
{
    public function show(){
        if(session('token') != ""){
            $token = session('token');

            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $checkToken = DB::table('tokens')->where('token',$token)->get();
            if(count($checkToken) == 1){
                $idUser = $json->idUser;
                $role = $json->role;
                $information = DB::table('information')->where('iduser',$idUser)->first();

                if($role == "user")
                    return View('profileUser',[ 'idUser' => $idUser , 'information' => $information ]);
                
                $company = DB::table('companies')->where('id_company' , $role)->first();
                $jobs = DB::table('jobs')->where('id_company', $company->id_company)->get();
                return View('profileCom',[ 'idUser' => $idUser, 'company' => $company ,'jobs' =>$jobs]);
            }
        }
        return redirect('/');
    }

    public function uploadPic(Request $req){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $idUser = $json->idUser;
            $req->file('myFile')->move(storage_path("userPic"), $idUser .".jpg");
            $query = DB::table('information')->where('iduser',$idUser)->update(['picture' => $idUser]);

            return redirect('/home/profile');
        }
        return redirect('/');
    }

    public function editInformation(Request $req){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $idUser = $json->idUser;
            
            $action = $req->input('action');
            $action = explode('_', $action)[1];
            $value = $req->input('value');
            
            $querry = DB::table('information')->where('iduser', $idUser)->update([ $action => $value ]);

            return response()->json([
                'error' => false,
                'message' => "Update Success !!",
                'value' => $value,
                'action' => $action
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => "Update Failed !!"
        ]);
    }

    public function showPostJob(){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $idUser = $json->idUser;
            $id_company = $json->role;
            $company = DB::table('companies')->where('id_company', $id_company)->first();

            return view('postJob',[ 'company' => $company ]);
        }
        return redirect('/');
    }

    public function postJob(Request $req){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $idUser = $json->idUser;
            $id_company = $json->role;
            
            $title = $req->input('title');
            $location = $req->input('location');
            $type = $req->input('type');
            $description = $req->input('description');
            $howToApply = $req->input('howToApply');

            $query = DB::table('jobs')->insert([
                'id_company' => $id_company , 'title' => $title, 'location' => $location, 'type' => $type, 'description' => $description, 'how_to_apply' =>$howToApply
            ]);

            return response()->json([
                'error' => false,
                'message' => "Update Failed !!"
            ]);
        }
        return redirect('/');
    }
}
