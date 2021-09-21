<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::wherePublished(true)->paginate(20));
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }
}
