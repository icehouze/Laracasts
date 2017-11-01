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
		// see refactor below for create method
		// create a new post using request data
		// $post = new Post;
		// $post->title = request('title');
		// $post->body = request('body');

		// save it to the database
		// $post->save();

		// Post::create([
		// 	'title' => request('title'),
		// 	'body' => request('body')
		// ]);

		// refactored to:
		Post::create(request(['title', 'body']));

		// redirect somewhere
		return redirect('/posts');
	}
}
