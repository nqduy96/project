<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                ['iduser' => $id, 'phone' => "", 'mail' => "", 'skype' => "", 'birthday' => "", 'address' => "", 'picture' => "default"]
            ]);

            return response()->json([ 'error' => false,
                        'message' => "Dang ky thanh cong"],200);
        }
        else
            return response()->json([ 'error' => true,
                                        'message' => "User da ton tai"],200);
        
    }
}
