<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\QueryBuilders\UserBuilder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return UserBuilder::make($request)->paginate();
    }

    public function show(Request $request, User $user)
    {
        return UserBuilder::make($request)->render($user);
    }
}
