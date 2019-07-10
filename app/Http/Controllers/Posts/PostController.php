<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Transformers\PostTransformer;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();

        return fractal()
            ->collection($posts)
            ->transformWith(new PostTransformer())
            ->respond(200, [], JSON_UNESCAPED_SLASHES);
    }
}
