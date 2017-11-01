<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
	public function index()
	{
		return view('posts.index');
	}

	public function show()
	{
		return view('posts.show');
	}

	public function create()
	{
		return view('posts.create');
	}

	public function store(Request $request)
	{
		// out of the box validation method; pipe separated list - 'title' => 'required|min:10'
		$this->validate(request(), [
			'title' => 'required',
			'body' => 'required'
		]);

		Post::create(request(['title', 'body']));

		return redirect('/posts');
	}
}
