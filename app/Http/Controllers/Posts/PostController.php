<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;
use App\Events\PostCreated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\PostTransformer;

class PostController extends Controller
{
    /**
     * PostController constructor.
     */
    public function __construct()
    {
        return $this->middleware(['auth'])
            ->only('store');
    }

    /**
     * Return all posts.
     *
     * @return void
     */
    public function index()
    {
        $posts = Post::latest()->get();

        return fractal()
            ->collection($posts)
            ->transformWith(new PostTransformer())
            ->respond(200, [], JSON_UNESCAPED_SLASHES);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $post = $request->user()->posts()->create($request->only('body'));

        PostCreated::dispatch($post); // broadcast to others

        return fractal()
            ->item($post)
            ->transformWith(new PostTransformer())
            ->respond(201, [], JSON_UNESCAPED_SLASHES);
    }
}
