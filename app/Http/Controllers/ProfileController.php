<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Place;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $posts = Post::where('user_id', $user->id)->get();
        $places = Place::where('user_id', $user->id)->get();

        return view('profile.show', compact('user', 'posts', 'places'));
    }

    public function showitem(Post $post)
    {
        $user = $post->user;
        
        return view('profile.showitem', compact('post', 'user'));
    }
    public function showitemplace(Place $place)
    {
        $user = $place->user;
        
        return view('profile.showitemplace', compact('place', 'user'));
    }
}
