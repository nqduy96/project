<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Libraries\jwt;

class TokensController extends Controller
{
    public function checkLogin(){
        $token = session('token');
        return ($token != "") ? redirect("/home") : View('login');       
    }
}
