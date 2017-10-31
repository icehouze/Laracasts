<?php

// import class
use App\Task;

Route::get('/tasks', function () {
	// Laravel's query builder
	// $tasks = DB::table('tasks')->latest()->get();

	// Using Eloquent and a dedicated class
	$tasks = Task::all();

    return view('tasks.index', compact('tasks'));
});

Route::get('/tasks/{task}', function ($id) {
	// Laravel's query builder
	// $task = DB::table('tasks')->find($id);

	// Using Eloquent and a dedicated class
	$task = Task::find($id);

    return view('tasks.show', compact('task'));
});
