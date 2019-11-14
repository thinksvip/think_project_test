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

//注册/登录/登出
Route::prefix('FrontEnd/V1')->namespace('FrontEnd\V1')->group(function (){
    Route::post('authenticate','Auth\ApiController@authenticate');
    Route::post('register','Auth\ApiController@register');
    Route::get('logout','Auth\ApiController@logout');
});
