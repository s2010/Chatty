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
    'middleware' => ['guest'],
]);
Route::post('/signup', [
    'uses' => '\Chatty\Http\Controllers\AuthController@postSignup',
    'middleware' => ['guest'],
]);


/*
* Sign in
*
*/

Route::get('/signin', [
    'uses' => '\Chatty\Http\Controllers\AuthController@getSignin',
    'as' => 'auth.signin',
    'middleware' => ['guest'],
]);

Route::post('/signin', [
    'uses' => '\Chatty\Http\Controllers\AuthController@postSignin',
    'middleware' => ['guest'],
]);

/*
* Sign out
*
*/

Route::get('/signout', [
    'uses' => '\Chatty\Http\Controllers\AuthController@getSignout',
    'as' => 'auth.signout',
]);

/*
* Sign out
*
*/

Route::get('/search', [
    'uses' => '\Chatty\Http\Controllers\SearchController@getResults',
    'as' => 'search.results',
]);

/*
* User Profile
*/

Route::get('/user/{username}', [
    'uses' => '\Chatty\Http\Controllers\ProfileController@getProfile',
    'as' => 'profile.index',
]);

Route::get('/profile/edit', [
    'uses' => '\Chatty\Http\Controllers\ProfileController@getEdit',
    'as' => 'profile.edit',
    'middleware' => ['guest'],
]);

Route::post('/profile/edit', [
    'uses' => '\Chatty\Http\Controllers\ProfileController@postEdit',
    'middleware' => ['guest'],
]);

/*
* Friends
*/

Route::get('/friends', [
    'uses' => '\Chatty\Http\Controllers\FriendController@getIndex',
    'as' => 'friend.index',
    'middleware' => ['auth'],
]);

Route::get('/friends/add/{username}', [
    'uses' => '\Chatty\Http\Controllers\FriendController@getAdd',
    'as' => 'friend.add',
    'middleware' => ['auth'],
]);


Route::get('/friends/accept/{username}', [
    'uses' => '\Chatty\Http\Controllers\FriendController@getAccept',
    'as' => 'friend.accept',
    'middleware' => ['auth'],
]);

/*
* Status
*/

Route::post('/status', [
    'uses' => '\Chatty\Http\Controllers\StatusController@postStatus',
    'as' => 'status.post',
    'middleware' => ['auth'],
]);

Route::post('/status/{statusId}/reply', [
    'uses' => '\Chatty\Http\Controllers\StatusController@postReply',
    'as' => 'status.reply',
    'middleware' => ['auth'],
]);

