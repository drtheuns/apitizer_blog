<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker, $attributes) {
    return [
        'body' => $faker->paragraph(5),
        'post_id' => $attributes['post_id'] ?? function () {
            return factory(Post::class)->create()->id;
        },
        'author_id' => $attributes['author_id'] ?? function () {
            return factory(User::class)->create()->id;
        },
    ];
});
