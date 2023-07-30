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
        // Check if the user is authorized to edit the post
        $this->authorize('update', $post);
    
        return view('uploadphoto.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
{
    // Validate the request data
    $request->validate([
        'title' => 'required|string|max:70',
        'description' => 'required|string|max:290',
        'image' => 'required|url',
        'location' => 'required|string'
    ]);

    // Fill the post attributes with the request data
    $post->fill($request->all());

    // Save the updated post to the database
    $post->save();

    return redirect()->route('profile.index')
        ->withSuccess(__('Post updated successfully.'));
}

    public function destroy(Post $post)
    {
        // Check if the user is authorized to edit the post
        $this->authorize('update', $post);
        
        $post->delete();

        return redirect()->route('profile.index')
            ->withSuccess(__('Post deleted successfully.'));
    }
}
