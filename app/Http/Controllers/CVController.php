<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CVController extends Controller
{
    public function show(Request $req, $idUser){
        $checkUser = DB::table('users')->where('iduser', $idUser)->get();
        if(count($checkUser) == 1){
            $infomation = DB::table('information')->where('iduser', $idUser)->first();
            $skills = DB::table('skills')->where('iduser', $idUser)->get();
            $experiences = DB::table('experiences')->where('iduser', $idUser)->get();
            $educations = DB::table('education')->where('iduser', $idUser)->get();

            return View('cv',[  'iduser' => $idUser,
                                'infomation' => $infomation,
                                'skills' => $skills, 
                                'experiences' => $experiences,
                                'educations' => $educations]);
        }
    }
}
