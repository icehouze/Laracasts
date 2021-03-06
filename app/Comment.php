<?php

namespace App;

class Comment extends Model
{
	// a comment belongs to only one post
	// if we want to fetch the post associuated with a comment
	// $comment->post;
	public function post()
	{
		// Eloquent provides this belongsTo method		
		return $this->belongsTo(Post::class);
	}

	// $comment->user->name;
	public function user()
	{
		// Eloquent provides this belongsTo method		
		return $this->belongsTo(User::class);

		 // it allows us to do: // $comment->user->name;
	}
}
