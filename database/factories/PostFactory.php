<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Post::class, function (Faker $faker) {
    return [
    	'user_id' => function () {
    		// manually whip up a new user, persist it and then return the id field.
    		return factory(App\User::class)->create()->id;
    	},
        'title' => $faker->sentence,
        'body' => $faker->paragraph
    ];
});
