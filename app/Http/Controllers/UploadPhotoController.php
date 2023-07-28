<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class UploadPhotoController extends Controller
{
    //
    // public function index () {
    //     return view('uploadphoto.index');
    // }

    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->get();

        return view('profile.index', compact('posts'));
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

        $today = Carbon::today();
        $count = Post::where('user_id', auth()->user()->id)->whereDate('created_at', $today)->count();

        if ($count >= 2) {
            return redirect()->route('profile.index')
                ->withError(__('You can only uploads 2 posts per day.'));
        }

        $post->save();

        return redirect()->route('profile.index');
    }

    public function show(Post $post)
    {
        $user = $post->user;
    

        return view('uploadphoto.show', compact('post', 'user'));
    }

    public function edit(Post $post)
    {
        return view('uploadphoto.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->only('title', 'description', 'image', 'location'));

        return redirect()->route('profile.index')
            ->withSuccess(__('Post updated successfully.'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('profile.index')
            ->withSuccess(__('Post deleted successfully.'));
    }
}
