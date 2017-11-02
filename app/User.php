<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // a user can have many posts
    // if we want to fetch a user's posts
    public function posts()
    {
        // Eloquent provides this hasMany method
        return $this->hasMany(Post::class); // class
    }

    public function publish(Post $post) {
        // and then save existing model data that you have (from PostController)
        $this->posts()->save($post);

        // because of established relationship, we can use above instead of:
        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'), 
        //     'user_id' => auth()->id()
        // ]);
    }
}
