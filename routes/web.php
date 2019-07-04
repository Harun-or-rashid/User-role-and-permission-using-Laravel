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

Route::get('/', function () {
    return view('partial.login');
});
Route::get('/login','AuthController@ShowLogin')->name('dashboard');
Route::post('/login','AuthController@SubmitLogin');
//Route::get('/dash','AuthController@');

Route::post('/registration','AuthController@MemberRegister')->name('register');
Route::get('/registration','AuthController@ShowRegister');


Route::group(['as'=>'super.','middleware'=>'SuperAdmin'], function (){

    Route::get('/super','SuperAdminController@showdashboard')->name('dashboard');

});
Route::group(['as'=>'admin.','middleware'=>'gadmin'],function (){
    Route::get('/gadmin','GeneralAdminController@showdashboard')->name('dashboard');
});



