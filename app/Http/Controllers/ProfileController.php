<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Place;
use Jorenvh\Share\Share;

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

    public function share(Post $post)
    {
        $user = $post->user;

        $share = new Share();
        $shareBtn = $share->page(
            url('https://camtravel.online/photo/12/show'),
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->whatsapp()
        ->pinterest()
        ->reddit()
        ->telegram();

        return view('uploadphoto.show', compact('post', 'user', 'shareBtn'));
    }


}
