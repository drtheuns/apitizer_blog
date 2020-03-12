<?php

use App\Schemas\CommentSchema;
use App\Schemas\PostSchema;
use App\Schemas\UserSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::schema(PostSchema::class);
Route::schema(CommentSchema::class);
Route::schema(UserSchema::class);
