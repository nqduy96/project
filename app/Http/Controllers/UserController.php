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
                ['iduser' => $id, 'firstname' => "", 'lastname' => "",'introduce' => "",
                'phone' => "", 'mail' => "", 'skype' => "", 'birthday' => "",
                'address' => "", 'picture' => "default", 'name_cv' => "default"]
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
        if($json->role == "user")
            return view('User.changePass',['idUser' => $idUser, 'information' => $information ]);
        
        $company = DB::table('companies')->where('id_user',$idUser)->first();
        return view('Company.changePass',['idUser' => $idUser, 'information' => $information ,'company' =>$company]);
        
    }

    public function createCompany(Request $req){
        $userName = $req->input('userName');
        $name = $req->input('name');
        $url = $req->input('url');
        $logo = $req->input('logo');

        $checkUsername = DB::table('users')->where('iduser',$userName)->first();
        
        if(count($checkUsername) == 0){
            
            $newUser = DB::table('users')->insert([
                ['iduser' => $userName,'password' => "company",'role' => "com"]
            ]);

            $newCompany = DB::table('companies')->insert([
                ['id_user' => $userName,'name' => $name,'company_url' => $url,'company_logo' => $logo]
            ]);

            $json = [
                'success' => true,
                'hasdata' => false,
            ];
            return response()->json($json,200);
        }

        $json = [
            'success' => false,
            'exception' => "Username already exists",    
        ];
        return response()->json($json,200);
    }

}
