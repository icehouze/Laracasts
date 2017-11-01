<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	// to tell laravel which fields are allowed to be mass assigned with create method
    protected $guarded = [];
    // or
    // protected $fillable = ['title', 'body'];
}
