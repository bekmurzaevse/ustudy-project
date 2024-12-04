<?php

use App\Http\Controllers\PostController;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;


Route::get("posts", [PostController::class,"posts"]);




