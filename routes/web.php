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

Route::get('/templatePic/{filename}', function ($filename)
{
    $path = storage_path() . '/templatePic/' . $filename;
    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('template');

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

Route::get('/home/profile/password','UserController@password')->name('profile.password');
Route::post('/home/profile/password/edit', 'UserController@editPass' )->name('pass.edit');

Route::get('home/profile/job','JobsController@showSaved')->name('profile.job');

// CV

Route::get('/home/cv/{idUser}','CVController@show')->name('home.cv');
Route::get('/home/profile/template','CVController@showTemplate')->name('profile.template');
Route::get('/home/profile/template/demo/{iduser}/{nametemplate}','CVController@demoTemplate')->name('template.demo');

//  Company

Route::get('/home/profile/postjob','ProfileController@showPostJob')->name('profile.postjob');
Route::post('/home/profile/postjob/post','ProfileController@postJob')->name('postjob.post');

// Xem bai viet
Route::get('/home/jobs/{idJob}','JobsController@show')->name('home.job');


// Apply job
Route::post('/home/jobs/apply','JobsController@apply')->name('jobs.apply');

// Save, Unsave job
Route::post('home/jobs/save','JobsController@save')->name('jobs.save');
Route::post('home/jobs/unsave','JobsController@unsave')->name('jobs.unsave');

// View Applications (company)
Route::get('/home/application','ApplicationController@showApplication')->name('home.application');
Route::get('/home/selected/application','ApplicationController@showSelectedApplication')->name('home.selectedApplication');
Route::post('/home/application/execute','ApplicationController@execute')->name('application.execute');

// View Admin
Route::get('/home/admin/user','AdminController@showUser')->name('admin.user');
Route::get('/home/admin/company','AdminController@showCompany')->name('admin.company');
Route::post('/home/admin/company','UserController@createCompany')->name('company.create');
