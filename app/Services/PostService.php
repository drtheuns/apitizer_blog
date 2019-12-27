<?php

namespace App\Services;

use App\Data\PostData;
use App\Models\Post;

class PostService
{
    public function createPost(PostData $input): Post
    {
        $post = new Post();
        $post->title = $input->title;
        $post->body = $input->body;
        $post->author_id = 2;
        $post->save();

        return $post;
    }
}
