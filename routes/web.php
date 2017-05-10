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
    return view('welcome');
});
//Admin Login
Route::group(['prefix'=>'admin','middleware' => 'admin.login'],function (){
    //Admin Login Page
    Route::get('login','Admin\LoginController@Login_view');
    //Admin Login Api
    Route::post('login','Admin\LoginController@Login_action');
});
//Admin Logout
Route::get('admin/logout',function (){
    session(['admintoken'=>'']);
    return redirect('admin/login');
});
//Admin Dash
Route::group(['prefix'=>'admin','middleware' => 'admin.userverfy'],function (){
    //Admin Main Page
    Route::get('main','Admin\DashController@Main_view');
    //Admin User Page
    Route::get('user','Admin\DashController@User_view');

});
Route::get('test','Admin\DashController@test');
