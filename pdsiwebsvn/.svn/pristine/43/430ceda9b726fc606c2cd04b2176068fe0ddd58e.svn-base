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

Route::post('LoginController/validateapi','Auth\LoginController@apilogin');
Route::post('Inspeksi/listmenu','Inspeksi@listmenu');
Route::post('Inspeksi/get','Inspeksi@get');
Route::get('Site/get','Site@listsite');

Route::post('Inspeksi/setuploadvisual','Inspeksi@setuploadvisual');
Route::post('Inspeksi/setuploaddimensi','Inspeksi@setuploaddimensi');

Route::post('Routingslip/listmenu','Routingslip@listmenu');
Route::post('Routingslip/get','Routingslip@get');
