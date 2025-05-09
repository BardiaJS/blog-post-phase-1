<?php

namespace App\Http\Controllers\Comment;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Comment\CommentResource;
use App\Http\Requests\Comment\CommentStoreRequest;
use App\Http\Requests\Comment\CommentUpdateRequest;

class CommentController extends Controller
{
    public function store_comment(CommentStoreRequest $commentStoreRequest , Post $post){
        $validated = $commentStoreRequest->validated();
        $validated['post_id'] = $post->id;
        $comment = Comment::create($validated);
        return response()->json([
            'message' => 'commented successfully!',
            'comment' => new CommentResource($comment)
        ]);
    }

    public function edit_comment(CommentUpdateRequest $commentUpdateRequest, Comment $comment){
        $validated = $commentUpdateRequest->validated();
        $comment->update($validated);
        return response()->json([
            'message' => 'updated successfully!',
            'comment' => new CommentResource($comment)
        ]);
    }

    public function delete_comment(Comment $comment){
        $comment->delete();
        return response()->json([
            'message' => 'deleted comment successfully'
        ]);
    }
}
