<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Post;


class HomeController extends Controller
{
    public function index()
    {
        $places = Place::latest()->paginate(10);
        $posts = Post::latest()->paginate(10);

        return view('home.index', compact('places', 'posts'));
    }
}