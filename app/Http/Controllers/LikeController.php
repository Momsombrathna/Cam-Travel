<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Store a newly created like in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        // Get the current user
        $user = $request->user();

        // Check if the user has not already liked the post
        if (!$user->hasLiked($post)) {
            // If no, add the like
            $like = new Like();
            $like->post_id = $post->id;
            $like->user_id = $user->id;
            $like->save();
        }

        // Return a response with a success message and the updated like count
        return response()->json([
            'message' => 'Like added successfully',
            'likes_count' => $post->likes()->count(),
        ]);
    }

    /**
     * Remove the specified like from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        // Get the current user
        $user = $request->user();

        // Check if the user has already liked the post
        if ($user->hasLiked($post)) {
            // If yes, remove the like
            $like = $user->likes()->where('post_id', $post->id)->first();
            $like->delete();
        }

        // Return a response with a success message and the updated like count
        return response()->json([
            'message' => 'Like removed successfully',
            'likes_count' => $post->likes()->count(),
        ]);
    }

    public function __invoke(Request $request, Post $post)
    {
        // Get the current user
        $user = $request->user();

        // Check if the user has already liked the post
        if ($user->hasLiked($post)) {
            // If yes, remove the like
            $user->unlike($post);
        } else {
            // If no, add the like
            $user->like($post);
        }

        // Return a response with a success message and the updated like count
        return response()->json([
            'message' => 'Like toggled successfully',
            'likes_count' => $post->likes()->count(),
        ]);
    }

}
