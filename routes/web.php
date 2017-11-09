<?php

Route::get('/', function () {
    return view('welcome');
})->name('home'); // assigns this route as home

Route::get('/tasks', 'TasksController@index'); 
Route::get('/tasks/create', 'TasksController@create');
Route::get('/tasks/{task}', 'TasksController@show'); 
Route::post('/tasks', 'TasksController@store');

Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{post}', 'PostController@show');
Route::post('/posts', 'PostController@store');

Route::get('/posts/tags/{tag}', 'TagController@index');

Route::post('/posts/{post}/comments', 'CommentController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionController@create');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');