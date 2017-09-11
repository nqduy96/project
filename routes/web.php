<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'TokensController@checkLogin')->name('/');
Route::post('/submit', 'AjaxController@login');

Route::get('/createUser', function(){
    return view('createuser');
})->name('createUser');

Route::post('/createUser/submit', 'UserController@register');

//  Set public Picture
Route::get('/userPic/{filename}', function ($filename)
{
    $path = storage_path() . '/userPic/' . $filename;
    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('avatar');

Route::get('/home','HomeController@show')->name('home');

Route::get('/home/logout','HomeController@logout')->name('home.logout');

Route::get('/home/profile','ProfileController@show')->name('home.profile');

Route::post('/home/profile/upload','ProfileController@uploadPic')->name('profile.upload');

Route::post('/home/profile/info/edit','ProfileController@editInformation')->name('info.edit');

Route::get('/home/profile/experience','ExperiencesController@show')->name('profile.experience');
Route::delete('/home/profile/experience/delete','ExperiencesController@delete');
Route::post('/home/profile/experience/insert','ExperiencesController@insert');
Route::post('/home/profile/experience/edit','ExperiencesController@edit');

Route::get('/home/profile/education','EducationController@show')->name('profile.education');
Route::delete('/home/profile/education/delete','EducationController@delete');
Route::post('/home/profile/education/insert','EducationController@insert');
Route::post('/home/profile/education/edit','EducationController@edit');

Route::get('/home/profile/skill','SkillsController@show')->name('profile.skill');
Route::delete('/home/profile/skill/delete','SkillsController@delete');
Route::post('/home/profile/skill/insert','SkillsController@insert');
Route::post('/home/profile/skill/edit','SkillsController@edit');

Route::get('/home/cv/{idUser}','CVController@show')->name('home.cv');

//  Company

Route::get('/home/profile/postjob','ProfileController@showPostJob')->name('profile.postjob');
Route::post('/home/profile/postjob/post','ProfileController@postJob')->name('postjob.post');

// Xem bai viet

Route::get('/home/jobs/{idJob}','JobsController@show')->name('home.job');
