<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Rating;

class PhotoController extends Controller
{
    //
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('photo.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $user = $post->user;
        $ratings = $post->ratings;
    

        return view('photo.show', compact('post', 'user', 'ratings'));
    }



}
