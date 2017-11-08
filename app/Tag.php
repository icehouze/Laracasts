<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
	{
		// many to many relationship
		// 1 post may have many tags; any tag may be applied to many posts
		return $this->belongsToMany(Post::class);
	} 

	// Handle the route-model binding when not using primary key
	public function getRouteKeyName()
	{
		return 'name';
	}
}
