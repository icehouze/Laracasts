<?php

namespace App;

class Post extends Model
{
	// a post can have many comments
	// if we want to fetch a posts's comments
	public function comments()
	{
		// Eloquent provides this hasMany method
		return $this->hasMany(Comment::class); // class
	}

	public function addComment($body) // accept the body from the request
	{
		//using Eloquent relationship we've established above
		$this->comments()->create(compact('body'));
		// $this->comments()->create(['body' => $body]);

		// if we were to say:
		// $this->comments() it would fetch all comments associated with the post

		// long form
		// Comment::create([
		// 	'body' => $body,
		// 	'post_id' => $this->id
		// ]);
	}
}
