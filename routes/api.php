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
Route::post('user',function(Request $request) {
    error_log($request);
    return App\user::create($request->all);
});
Route::put('user/{id}', function(Request $request,$id) {
    $user = App\user::findOrFail($id);
    $user->update($request->all());
    return $user;
});
Route::delete('user/{id}',function($id) {
    App\user::find($id)->delete();
    return 204;
});


