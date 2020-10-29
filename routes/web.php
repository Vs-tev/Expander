<?php

use Illuminate\Support\Facades\Route;
use App\Notifications\NewApplyNotification;
use App\User;
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


Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

//project
Route::get('/', 'HomeController@index')->name('home');
Route::get('/create', 'ProjectController@create');
Route::post('/create', 'ProjectController@store');
Route::get('/index/{id}', 'ProjectController@index');
Route::get('/project/{project}', 'ProjectController@edit');
Route::post('/project/{project}', 'ProjectController@update');
Route::get('/destroy/{project}', 'ProjectController@destroy');
Route::get('/project_deteils/{project}', 'HomeController@project');

//User
Route::post('/index/{id}', 'UserController@updateImg');
Route::patch('/index/{user}/profile', 'UserController@update');

//Profile
Route::get('/profile/{user}', 'ProfileController@index');

//comments
Route::post('/comments/{project}', 'CommentsController@store');

//apply
Route::post('/project_deteils/{project}', 'ApplyController@store');
Route::get('/applications/{project}', 'ApplyController@index');
Route::get('/myapplyings', 'ApplyController@myapplyings');

//reply
Route::post('/reply/{apply_id}', 'ApplyController@reply');




Route::get('/x', function(){

    $user = Auth::user();

    $user->notify(new NewApplyNotification(User::findOrFail(5))); 
   

    return view('test', compact('user'));
        
    
});

