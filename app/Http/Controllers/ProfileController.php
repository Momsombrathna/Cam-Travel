<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $posts = Post::where('user_id', $user->id)->get();

        return view('profile.show', compact('user', 'posts'));
    }

    public function showitem(Post $post)
    {
        $user = $post->user;
        
        return view('profile.showitem', compact('post', 'user'));
    }
}
