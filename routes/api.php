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

Route::group(['prefix' => 'mediums_global'], function(){
    Route::get('/', 'Api\MediumGlobalController@index');
    Route::get('/{id}', 'Api\MediumGlobalController@show');
    Route::post('/', 'Api\MediumGlobalController@store');
    Route::patch('/{id}', 'Api\MediumGlobalController@update');
    Route::delete('/{id}', 'Api\MediumGlobalController@destroy')->middleware('auth:api');
});

Route::group(['prefix' => 'shifts_global'], function(){
    Route::get('/', 'Api\ShiftGlobalController@index');
    Route::get('/{id}', 'Api\ShiftGlobalController@show');
    Route::post('/', 'Api\ShiftGlobalController@store');
    Route::patch('/{id}', 'Api\ShiftGlobalController@update');
    Route::delete('/{id}', 'Api\ShiftGlobalController@destroy')->middleware('auth:api');
});

Route::group(['prefix' => 'sections'], function(){
    Route::get('/', 'Api\SectionController@index');
    Route::get('/{id}', 'Api\SectionController@show');
    Route::post('/', 'Api\SectionController@store')->middleware('auth:api');
    Route::patch('/{id}', 'Api\SectionController@update');
    Route::delete('/{id}', 'Api\SectionController@destroy')->middleware('auth:api');
});

Route::group(['prefix' => 'formats_global'], function(){
    Route::get('/', 'Api\FormatGlobalController@index');
    Route::post('/', 'Api\FormatGlobalController@store');
});

Route::group(['prefix' => 'classes_global'], function(){
    Route::get('/', 'Api\ClassGlobalController@index');
    Route::post('/', 'Api\ClassGlobalController@store');
});