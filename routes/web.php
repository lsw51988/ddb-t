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
Route::group(['middleware'=>['web']],function(){
    Route::post('/api/member/login', "Api\Member\IndexController@index");
    Route::get('/api/member/captcha', "Api\Member\IndexController@captcha");
    Route::get('/api/member/verifyCaptcha', "Api\Member\IndexController@verifyCaptcha");
    Route::get('/info', "Api\Member\IndexController@info");
});