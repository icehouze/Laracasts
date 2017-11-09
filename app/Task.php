<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = [
        'body',
    ];
    //  Query scopes
    public function scopeIncomplete($query) // Task::incomplete()
    {
    	return $query->where('completed', 0);
    }
}
