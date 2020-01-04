<?php

namespace App\Http\Controllers;

use App\QueryBuilders\CommentBuilder;
use Illuminate\Http\Request;

class CommentController
{
    public function index(Request $request)
    {
        return CommentBuilder::make($request)->all();
    }
}
