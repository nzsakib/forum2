<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/threads', 'ThreadsController@index');
Route::post('/threads', 'ThreadsController@store');
Route::get('/threads/{thread}', 'ThreadsController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/threads/{thread}/replies', 'RepliesController@store'); 

