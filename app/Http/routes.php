<?php

/*
* Home
*
*/
Route::get('/', [
    'uses' => '\Chatty\Http\Controllers\HomeController@index',
    'as' => 'home',
]);

Route::get('/alert', function (){
    return redirect()->route('home')->with('info','You have signed up!');
});

/*
* Authentication
*
*/

Route::get('/signup', [
    'uses' => '\Chatty\Http\Controllers\AuthController@getSignup',
    'as' => 'auth.signup',
]);
Route::post('/signup', [
    'uses' => '\Chatty\Http\Controllers\AuthController@postSignup',
]);