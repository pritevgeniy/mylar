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

Route::prefix('v1')->group(function(){
    Route::get('translates/languages-list', 'Api\v1\TranslateController@languagesList');
    Route::get('translates', 'Api\v1\TranslateController@index');
    Route::get('translates/{lang}', 'Api\v1\TranslateController@index');
    Route::get('translates/{lang}/{texttype}', 'Api\v1\TranslateController@show');
    Route::post('translates', 'Api\v1\TranslateController@store');
    Route::put('translates', 'Api\v1\TranslateController@update');
    Route::delete('translates', 'Api\v1\TranslateController@delete');
});
