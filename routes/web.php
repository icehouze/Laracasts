<?php

Route::get('/tasks', 'TasksController@index'); // ControllerName@method
Route::get('/tasks/{task}', 'TasksController@show'); // ControllerName@method

Route::get('/', 'PostController@index');
Route::get('/posts/{post}', 'PostController@show');