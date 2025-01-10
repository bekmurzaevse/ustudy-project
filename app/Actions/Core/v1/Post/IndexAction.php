<?php

// namespace App\Actions\Core\v1\Post;
namespace App\Actions\Core\v1\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class IndexAction
{
    ////
    public function __invoke()
    {
        $data = Cache::remember('posts', now()->addMinute(), function () {
            $items = Post::query();
            return $items->paginate(perPage:10, page:1);
        });

        return response()->json([
            'count' => count($data),
            'ttl' => Redis::ttl(config('cache.prefix') . 'posts'),
            'data' => $data
            // 'data' => Post::paginate(perPage:10, page:1)
        ]);
    }

}
