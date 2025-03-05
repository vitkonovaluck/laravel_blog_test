<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Symfony\Component\HttpFoundation\Response;


class CommentsController extends Controller
{
    //
    public function store(CommentRequest $request, $id)
    {
        $request->validated();

        $comment = new Comment();
        $comment->content = $request->comment;
        $comment->post_id = $id;
        $comment->save();

        return response()->json(['message' => 'Коментар додано!'], Response::HTTP_CREATED);
    }
}
