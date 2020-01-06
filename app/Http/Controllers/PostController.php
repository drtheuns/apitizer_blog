<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QueryBuilders\PostBuilder;

class PostController
{
    public function index(Request $request)
    {
        // return PostBuilder::make($request)->paginate();
        return PostBuilder::make($request)->paginate();
    }
}
