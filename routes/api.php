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

Route::group(['prefix'=>'v1'],function(){
    Route::group(['middleware' =>'JWT'],function (){
        Route::resource('visitor',"VisitorController",['except'=>['create','index','edit']]);
        Route::resource('pwso',"PWSOController",['except'=>['create','index','edit']]);
        Route::resource('wso',"WSOController",['except'=>['create','index','edit']]);
        Route::resource('university','UniversityController',['only'=>['show','index']]);
        Route::resource('faculty','FacultyController',['only'=>['show','index']]);
        Route::resource('school','SchoolController',['only'=>['show']]);
        Route::resource('institute','InstituteController',['only'=>['show','index']]);
        Route::resource('academy','AcademyController',['only'=>['show','index']]);
        Route::resource('acadfaculty','AcadfacultyController',['only'=>['show','index']]);
        Route::resource('event','EventController',['except'=>['create', 'index','edit']]);
        Route::get('workspaceevents/{workspace_id}',[
            'uses'=>'EventController@showEvents'
        ]);
        Route::get('schoollocation/{city}', [
            'uses' => 'SchoolController@showschools'
        ]);
        Route::get('schoollocation', [
            'uses' => 'SchoolController@showcities'
        ]);
        Route::post('upgrade/{id}',[
            'uses'=>'PWSOController@upgrade'
        ]);
        Route::get('rate/{workspace_id}',[
            'uses'=>'RateController@getRate'
        ]);
        Route::post('rate',[
            'uses'=>'RateController@updateRate'
        ]);
        Route::post('personalrate',[
            'uses'=>'RateController@personalRate'
        ]);
    });
    Route::get('about',[
        'uses'=>'DbseController@about'
    ]);
    Route::post('signin',[
        'uses'=>'SigninController@signin'
    ]);
    Route::post('signup',[
        'uses'=>'SignupController@signup'
    ]);
    Route::post('signupverify', [
        'uses'=>'signupController@verify'
    ]);
    Route::post('workspaceVerify', [
        'uses'=>'signupController@verifyWorkspace'
    ]);
    Route::post('forgetpassword',[
        'uses'=>'ForgetPasswordController@getNewPassword'
    ]);

} ) ;

