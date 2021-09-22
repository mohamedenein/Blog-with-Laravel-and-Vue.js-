<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Faker\Provider\Uuid;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::when(request('category_id','') !='',function ($query) {
            $query->where('category_id', request('category_id'));
        })->paginate(20);

        return PostResource::collection($posts);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $post->uuid = Uuid::uuid();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->title . Str::random(5);
        $post->category_id = $request->category_id;
        $post->save();

        return new PostResource($post);

    }
}
