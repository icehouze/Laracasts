<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

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
		// $posts = Post::latest();

		// // check see if month request exist in url string and filter the query accordingly
		// if ($month = request('month')) {
		// 	$posts->whereMonth('created_at', Carbon::parse($month)->month); // convert May => 5, October => 10 with Carbon
		// }
		// // check see if year request exist in url string and filter the query accordingly
		// if ($year = request('year')) {
		// 	$posts->whereYear('created_at', $year);
		// }

		// $posts = $posts->get();

		// Let's refactor what's above

		// we still want to fetch all posts, but we wannt to filter them by the request and let the query scope handle that; 
		// we are passing 'month' and 'year' to the query scope in Post.php
		$posts = Post::latest()
			->filter(request(['month', 'year']))
			->get();

		// selectRaw is a function that allowes us to use basic SQL queries
		// groupBy allows us to craete aggregate results of the count(*)
		$archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
			->groupBy('year', 'month')
			->orderByRaw('min(created_at) desc')
			->get()
			->toArray();

		// pass new archives variable through to view
		return view('posts.index', compact('posts', 'archives'));
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
