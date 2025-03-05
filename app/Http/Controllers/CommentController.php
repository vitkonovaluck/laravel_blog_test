<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request, Post $post)
    {
        $request->validated();

        $comment = new Comment();
        $comment->content = $request->comment;
        $comment->post_id = $post->id;
        $comment->save();

        return back()->with('success', 'Коментар додано!');
    }


}
