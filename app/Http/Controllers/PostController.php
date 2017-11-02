<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
	// lockdown everything but index & show from non-users
	public function __construct()
	{
		$this->middleware('auth')->except(['index', 'show']);
	}

	public function index()
	{
		// fetch all posts and sort latest ones first
		$posts = Post::latest()->get();

		// now pass that through to the view
		return view('posts.index', compact('posts'));
	}

	public function show(Post $post)
	{
		// now pass that through to the view
		return view('posts.show', compact('post'));
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

		// Post::create([
		// 	'title' => request('title'),
		// 	'body' => request('body'), 
		// 	'user_id' => auth()->id()
		// ]);

		// or we could do and move above to User.php:
		// new up a post with request data to pass to publish method
		auth()->user()->publish(
			new Post(request(['title', 'body']))
		);

		return redirect('/posts');
	}
}
