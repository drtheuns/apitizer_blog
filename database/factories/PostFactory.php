<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Post::class, function (Faker $faker, $attributes) {
    return [
        'title' => $faker->catchPhrase,
        'body' => $faker->paragraph(5),
        'status' => Arr::random(['published', 'draft', 'scrapped', 'another-status']),
        'author_id' => $attributes['author_id'] ?? function () {
            return factory(User::class)->create()->id;
        },
    ];
});

$factory->state(Post::class, 'withComments', []);
$factory->afterCreatingState(Post::class, 'withComments', function ($post, $faker) {
    factory(Comment::class, 5)->create(['post_id' => $post->id]);
});
