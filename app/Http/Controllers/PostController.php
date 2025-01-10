<?php

namespace App\Http\Controllers;

use App\Actions\Core\v1\Post\IndexAction;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    public function posts(IndexAction $action): JsonResponse
    {
        dd('123');
        // $data = Cache::remember('posts', now()->addMinute(), function () {
        //     $items = Post::query();
        //     return $items->paginate(perPage:10, page:1);
        // });

        // return response()->json([
        //     'count' => count($data),
        //     'ttl' => Redis::ttl(config('cache.prefix') . 'posts'),
        //     'data' => $data
        //     // 'data' => Post::paginate(perPage:10, page:1)
        // ]);
        return $action();
    }






}
