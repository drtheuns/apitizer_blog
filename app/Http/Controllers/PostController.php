<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QueryBuilders\PostBuilder;
use App\Services\PostService;
use App\Data\PostData;

class PostController
{
    protected $postService;

    public function __construct(PostService $postService) {
        $this->postService = $postService;
    }

    public function index(Request $request)
    {
        // return PostBuilder::make($request)->paginate();
        return PostBuilder::make($request)->all();
    }

    public function store(Request $request)
    {
        $post = $this->postService->createPost(new PostData($request->all()));

        return PostBuilder::make($request)->render($post);
    }
}
