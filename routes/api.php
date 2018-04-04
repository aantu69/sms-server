<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('/register', 'RegisterController@register')->middleware('auth:api');
Route::post('/register', 'Api\RegisterController@register');
Route::post('/users/{user}', 'Api\RegisterController@show');


Route::group(['prefix' => 'institutes'], function(){
    Route::get('/', 'Api\InstituteController@index');
    Route::post('/', 'Api\InstituteController@store');
});

Route::group(['prefix' => 'mediums'], function(){
    Route::get('/', 'Api\MediumController@index');
    Route::post('/', 'Api\MediumController@store');
});

Route::group(['prefix' => 'shifts'], function(){
    Route::get('/', 'Api\ShiftController@index');
    Route::post('/', 'Api\ShiftController@store');
});

Route::group(['prefix' => 'class_formats'], function(){
    Route::get('/', 'Api\ClassFormatController@index');
    Route::post('/', 'Api\ClassFormatController@store');
});

Route::group(['prefix' => 'classes'], function(){
    Route::get('/', 'Api\ClassController@index');
    Route::post('/', 'Api\ClassController@store');
});