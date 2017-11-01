<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', 'TasksController@index'); // ControllerName@method
Route::get('/tasks/{task}', 'TasksController@show'); // ControllerName@method

Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{post}', 'PostController@show');
Route::post('/posts', 'PostController@store');