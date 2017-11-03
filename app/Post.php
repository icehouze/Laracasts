<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{
	// a post can have many comments
	// if we want to fetch a posts's comments
	public function comments()
	{
		// Eloquent provides this hasMany method
		return $this->hasMany(Comment::class); // class
	}

	// $post->user->name;
	public function user()
	{
		// Eloquent provides this belongsTo method		
		return $this->belongsTo(User::class);

		 // it allows us to do: // $post->user->name;
	}

	public function addComment($body) // accept the body from the request
	{
		//using Eloquent relationship we've established above
		$this->comments()->create(compact('body'));
		// $this->comments()->create(['body' => $body]);

		// if we were to say:
		// $this->comments() it would fetch all comments associated with the post
	}

	// Let's set up the query scope to handle the archives request filter (month, year)
	// accepts the current query and any data you pass through to it (in this case 'month' and 'year' from PostController.php)
	public function scopeFilter($query, $filters) 
	{
		// check see if month was passed to the filter and if so, add a where clause
		if ($month = $filters['month']) {
			$query->whereMonth('created_at', Carbon::parse($month)->month); 
		}
		// check see if year was passed to the filter and if so, add a where clause
		if ($year = $filters['year']) {
			$query->whereYear('created_at', $year);
		}
	}
}
