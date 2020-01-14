<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\QueryBuilders\CommentBuilder;
use Illuminate\Http\Request;

class CommentController
{
    public function index(Request $request)
    {
        return CommentBuilder::make($request)->all();
    }

    public function show(Request $request, Comment $comment)
    {
        return CommentBuilder::make($request)->render($comment);
    }
}
