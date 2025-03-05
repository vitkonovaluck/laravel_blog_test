<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\PostRepository;

class PostsController extends Controller
{

    public function show(Post $post)
    {
        return view('post.show', [
            'post' => $post
        ]);
    }


}
