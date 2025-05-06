<?php

namespace App\Http\Controllers\Post;

use App\Http\Resources\Post\PostCollection;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Post\PostResource;
use App\Http\Requests\Post\PostCreateRequest;
use App\Http\Requests\Post\PostUpdateRequest;

class PostController extends Controller
{
    public function create_post(PostCreateRequest $postCreateRequest){
        $validated = $postCreateRequest->validated();
        $validated['user_id'] = Auth::user()->id;
        $post = Post::create($validated);
        return response()->json([
            'message' => 'post created successfully!' ,
            'post' => new PostResource($post)
        ]);
    }

    public function update_post(PostUpdateRequest $postUpdateRequest , Post $post){
        $validated = $postUpdateRequest->validated();
        $validated['created_time'] =  Carbon::now()->format('Y-m-d H:i:s');
        $post->update($validated);
        return response()->json([
            'message' => 'updated successfully',
            'post' => new PostResource($post)
        ]);
    }

    public function get_all_posts(){
        $posts = Post::all();
        return new PostCollection($posts);
    }

    public function get_single_post(Post $post){
        $comments_of_post = $post->comments;
        return response()->json([
            'post' => new PostResource($post) ,
            'comments' => $comments_of_post 
        ]);
    }

    public function delete_post(Post $post){
        $post->delete();
        return response()->json([
            'message' => 'deleted successfully!'
        ]);
    }

}

