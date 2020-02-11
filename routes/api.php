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

Route::get('GoogleAdsApi','ApiCaller@apiresponse');
Route::post('GoogleAdsApi','ApiCaller@apiresponse');
Route::get('GoogleAdsApiResponse','GoogleAdsApi@GoogleResponseData');
Route::post('GoogleAdsApiResponse','GoogleAdsApi@GoogleResponseData');