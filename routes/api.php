<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/member/login', "Api\Member\IndexController@index")->name("apiLogin");
Route::get('/member/captcha', "Api\Member\IndexController@captcha");
Route::get('/member/verifyCaptcha', "Api\Member\IndexController@verifyCaptcha");

Route::post('/info', "Api\Member\InfoAuthController@store");
Route::get('/swoole', "Api\Member\SwooleController@test");