<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
	// add a comment to a post
    public function store(Post $post) // this will receive the post
    {
    	$this->validate(request(), ['body' => 'required|min:2']);

    	$post->addComment(request('body'));

    	// long form - we moved it to PostController and are using method above.
    	// Comment::create([
    	// 	'body' => request('body'),
    	// 	'post_id' => $post->id
    	// ]);

    	return back();
    }
}
