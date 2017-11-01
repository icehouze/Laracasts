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
}
