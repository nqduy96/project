<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
    public function show(Request $req, $idJob){
        $job = DB::table('jobs')->join('companies', 'jobs.id_company', '=' , 'companies.id_company')
            ->where('jobs.id',$idJob)
            ->select('jobs.*','companies.company_logo')->first();


        return view('job',['job' => $job]);
    }
}
