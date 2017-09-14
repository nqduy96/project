<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Libraries\jwt;

class UserController extends Controller
{
    public function register(Request $req){
        $id = $req->input('idUser');
        $pass = $req->input('password');

        $checkId = DB::table('users')->where('iduser',$id)->first();
        if(count($checkId) != 1){
            $queryUser = DB::table('users')->insert([
                ['iduser' => $id, 'password' => $pass, 'role' => "user"]
            ]);

            $queryInfo = DB::table('information')->insert([
                ['iduser' => $id, 'firstname' => "", 'lastname' => "",'introduce' => "", 'phone' => "", 'mail' => "", 'skype' => "", 'birthday' => "", 'address' => "", 'picture' => "default"]
            ]);

            return response()->json([ 'error' => false,
                        'message' => "Dang ky thanh cong"],200);
        }
        else
            return response()->json([ 'error' => true,
                                        'message' => "User da ton tai"],200);
        
    }

    public function editPass(Request $req){
        $oldpPass = $req->input('oldPass');
        $newPass = $req->input('newPass');

        if(session('token') == "")
            return redirect('/');

        $token = session('token');
        $json = JWT::decode($token, "ANH_DUY_OK",true);
        $idUser = $json->idUser;
        $user = DB::table('users')->where('iduser', $idUser)->first();

        if($oldpPass == $user->password){
            DB::table('users')->where('iduser', $idUser)->update(['password' => $newPass]);
            return response()->json(['error' => false, 'message'=> "Change Password Success"]);
        }
        return response()->json(['error' => true, 'message'=> "Password Not true"]);
    }

    public function password(){
        if(session('token') == "")
            return redirect('/');

        $token = session('token');
        $json = JWT::decode($token, "ANH_DUY_OK",true);
        $idUser = $json->idUser;
        $information = DB::table('information')->where('iduser',$idUser)->first();
        
        return view('changePass',['idUser' => $idUser, 'information' => $information ]);
    }
}
