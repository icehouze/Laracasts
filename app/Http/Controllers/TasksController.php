<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
		$tasks = Task::all();

	    return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task) // route model binding replaces: $task = Task::find($wildcard);
    {
	    return view('tasks.show', compact('task'));
    }

    public function create()
    {
		return view('tasks.create');
    }

    public function store(Request $request)
    {
    	$this->validate(request(), [
			'body' => 'required'
		]);

		Task::create([
			'body' => request('body'), 
		]);

		return redirect('/tasks');
    }
}
