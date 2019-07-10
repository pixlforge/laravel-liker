<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'body' => $faker->paragraphs(3, true),
    ];
});
