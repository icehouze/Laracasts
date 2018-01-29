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
		$this->comments()->create(['body' => $body, 'user_id' => auth()->id()]);

		// if we were to say:
		// $this->comments() it would fetch all comments associated with the post
	}

	// Let's set up the query scope to handle the archives request filter (month, year)
	// accepts the current query and any data you pass through to it (in this case 'month' and 'year' from PostController.php)
	public function scopeFilter($query, $filters) 
	{
		// check see if month was passed to the filter and if so, add a where clause
		// if (isset) portion is added from comments section of Archives video to handle an empty array when viewing just posts page
		if (isset($filters['month'])){
			if($month = $filters['month']) {
			$query->whereMonth('created_at', Carbon::parse($month)->month);
			}
		}
		// check see if year was passed to the filter and if so, add a where clause
		if(isset($filters['year'])){
			if($year = $filters['year']){
			$query->whereYear('created_at', $year);
			}
		}
	}

	// static so it is available outside of Post model
	public static function archives()
	{
		return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
			->groupBy('year', 'month')
			->orderByRaw('min(created_at) desc')
			->get()
			->toArray();
	}

	public function tags()
	{
		// many to many relationship
		// 1 post may have many tags; any tag may be applied to many posts
		return $this->belongsToMany(Tag::class);
	} 
}
