<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostsController extends Controller
{
    //
    public function index()
    {
        $posts = Post::with(['category', 'comments'])->orderByDesc('created_at')->get();

        return response()->json(['posts' => $posts], Response::HTTP_OK);
    }

    public function show($id)
    {
        $post = Post::with(['category', 'comments'])->find($id);

        return response()->json(['post' => $post], Response::HTTP_OK);
    }
}
