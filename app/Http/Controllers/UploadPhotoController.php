<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class UploadPhotoController extends Controller
{
    //
    // public function index () {
    //     return view('uploadphoto.index');
    // }

    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->get();

        return view('uploadphoto.index', compact('posts'));
    }

    public function create()
    {
        $users = User::all();

        return view('uploadphoto.create', compact('users'));
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->image = $request->input('image');
        $post->location = $request->input('location');
        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect()->route('uploadphoto.index');
    }

    public function show(Post $post)
{
    $user = $post->user;

    return view('uploadphoto.show', compact('post', 'user'));
}
}
