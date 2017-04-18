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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['prefix'=>'v1' ,'middleware' => 'JWT'],function(){
    Route::resource('visitor',"VisitorController",['except'=>['create','index','edit']]);
    Route::resource('pwso',"PWSOController",['except'=>['create','index','edit']]);
    Route::resource('wso',"WSOController",['except'=>['create','index','edit']]);
    Route::resource('emailverification','EmailVerificationController',['only'=>['store','update','destroy']]);
    Route::resource('university','UniversityController',['only'=>['show','index']]);
    Route::resource('faculty','FacultyController',['only'=>['show','index']]);
} ) ;

Route::post('/signin',[
    'uses'=>'SigninController@signin'
]);

