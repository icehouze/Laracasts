<?php

Route::get('/tasks', 'TasksController@index'); // ControllerName@method
Route::get('/tasks/{task}', 'TasksController@show'); // ControllerName@method