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
                    return View('User.profile',[ 'idUser' => $idUser , 'information' => $information ]);
                
                $company = DB::table('companies')->where('id_user' , $idUser)->first();
                $jobs = DB::table('jobs')->where('id_user', $company->id_user)->get();
                return View('Company.profile',[ 'idUser' => $idUser, 'company' => $company ,'jobs' =>$jobs]);
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
            if($action == "fullname"){
                $value = $req->input('value');
                $valueFirstname = explode('_', $value)[0];
                $valueLastname = explode('_', $value)[1];
                $querry = DB::table('information')->where('iduser', $idUser)->update([ 'firstname' => $valueFirstname ,'lastname' => $valueLastname]);
            }
            else{
                $value = $req->input('value');
                error_log($value . "_" . $action);
                $querry = DB::table('information')->where('iduser', $idUser)->update([ $action => $value ]);
                
            }
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
            $company = DB::table('companies')->where('id_user', $idUser)->first();
            
            $PLS = DB::table('p_ls')->get();
            $locations = \App\locations::all();

            return view('Company.postJob',[ 'company' => $company ,'PLS' => $PLS, 'locations' => $locations]);
        }
        return redirect('/');
    }

    public function postJob(Request $req){
        if(session('token') != ""){
            $token = session('token');
            $json = JWT::decode($token, "ANH_DUY_OK",true);
            $idUser = $json->idUser;
            
            $title = $req->input('title');
            $tag = $req->input('tag');
            $location = $req->input('location');
            $type = $req->input('type');
            $description = $req->input('description');
            $howToApply = $req->input('howToApply');

            $query = DB::table('jobs')->insert([
                'id_user' => $idUser ,
                'tag' => $tag,
                'title' => $title,
                'location' => $location,
                'type' => $type,
                'description' => $description,
                'how_to_apply' =>$howToApply
            ]);

            return response()->json([
                'error' => false,
                'message' => "Update Failed !!"
            ]);
        }
        return redirect('/');
    }
}
