<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/threads', 'ThreadsController@index');
Route::post('/threads', 'ThreadsController@store');
Route::get('/threads/create', 'ThreadsController@create');
Route::get('/threads/{channel}/{thread}', 'ThreadsController@show');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store'); 
Route::get('threads/{channel}', 'ThreadsController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/replies/{reply}/favorites', 'FavoritesController@store');


