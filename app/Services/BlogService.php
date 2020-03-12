<?php

namespace App\Services;

use App\Models\User;
use App\Models\Post;

class BlogService
{
    public function createPost(array $params)
    {
        // Since we have no auth.
        $user = User::first();

        $post = new Post($params);
        $post->author()->associate($user);
        $post->save();

        return $post;
    }
}
