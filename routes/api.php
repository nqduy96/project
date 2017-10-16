<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
|--------------------------------------------------------------------------
| API User
|--------------------------------------------------------------------------
*/
Route::get('user',function() {
    return App\user::all();
});
Route::get('user\{$id}',function($id) {
    return App\user::find($id);
});
Route::post('user','AjaxController@loginMobile');

Route::put('user\{id}', function(Request $request,$id) {
    $user = App\user::findOrFail($id);
    $user->update($request->all());
    return $user;
});
Route::delete('user\{id}',function($id) {
    App\user::find($id)->delete();
    return 204;
});

/*
|--------------------------------------------------------------------------
| API Jobs
|--------------------------------------------------------------------------
*/

Route::get('job',function() {
    $job = DB::table('jobs')->join('companies','jobs.id_user', '=' , 'companies.id_user')
        ->select('jobs.*','companies.*')->get();
return $job;
});

/*
|--------------------------------------------------------------------------
| API Location
|--------------------------------------------------------------------------
*/

Route::get('location',function() {
    return App\locations::all();
});

/*
|--------------------------------------------------------------------------
| API Language
|--------------------------------------------------------------------------
*/

Route::get('language',function() {
    return DB::table('p_ls')->get();
});

/*
|--------------------------------------------------------------------------
| API Token
|--------------------------------------------------------------------------
*/

Route::post('token','TokensController@checkLoginMobile');