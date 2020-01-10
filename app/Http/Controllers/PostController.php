<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QueryBuilders\PostBuilder;
use App\Models\Post;

class PostController
{
    public function index(Request $request)
    {
        // return PostBuilder::make($request)->paginate();
        return PostBuilder::make($request)->paginate();
    }

    public function show(Request $request, Post $post)
    {
        return PostBuilder::make($request)->render($post);
    }
}
