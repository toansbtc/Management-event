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

Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/allevent','eventcontroller@index');

Route::get('/newevent',function(){
    return view('createevent');
});
Route::post('/newevent','eventcontroller@store');
Route::get('/getevent','eventcontroller@search');
Route::get('/infor/{id}','eventcontroller@show');
Route::get('/delete/{id}','eventcontroller@destroy');
Route::get('/join/{id}','eventcontroller@join');
Route::get('/update/{id}','eventcontroller@formupdate');
Route::post('/update','eventcontroller@update');
Route::get('/user/event/yourevent','eventcontroller@yourevent');
Route::get('/notice','student@getnotice');
Route::get('/sendinvite','student@sendinvite');
Route::get('/shownotice','student@shownotice');
Route::get('/acceptjoin/{id}','eventcontroller@acceptjoin');
Route::get('/noaccept/{id}','eventcontroller@noaccept');

