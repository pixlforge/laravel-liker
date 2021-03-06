<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\PostTransformer;
use App\Events\PostLiked;

class PostLikeController extends Controller
{
    /**
     * PostLikeController constructor.
     */
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function store(Post $post, Request $request)
    {
        $this->authorize('like', $post);

        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        PostLiked::broadcast($post)->toOthers();

        return fractal()
            ->item($post->fresh())
            ->transformWith(new PostTransformer())
            ->respond(201, [], JSON_UNESCAPED_SLASHES);
    }
}
