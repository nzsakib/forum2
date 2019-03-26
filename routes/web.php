<?php

Route::get('/', function () {
    return redirect('/threads');
});

Route::get('/threads', 'ThreadsController@index');
Route::post('/threads', 'ThreadsController@store');
Route::get('/threads/create', 'ThreadsController@create');
Route::get('/threads/{channel}/{thread}', 'ThreadsController@show');
Route::delete('/threads/{channel}/{thread}', 'ThreadsController@destroy');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store'); 
Route::delete('/replies/{reply}', 'RepliesController@destroy');
Route::get('threads/{channel}', 'ThreadsController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/replies/{reply}/favorites', 'FavoritesController@store');

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
