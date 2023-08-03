<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\URL;
use Jorenvh\Share\Share;

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

        $share = new Share();
        $shareButtons = $share->page(
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

        return view('photo.show', compact('post', 'user', 'shareButtons'));
    }
}
