<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Place;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if (empty($search)) {
            return redirect()->route('home.index');
        }

        $users = User::where(function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('username', 'like', '%' . $search . '%');
        })->get();

        $posts = Post::where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');   
        })->get();

        $places = Place::where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        })->get();

        return view('search.index', compact('users', 'posts', 'places' ));
    }

    public function search_post(Request $request) {

        $search = $request->input('search');

        if (empty($search)) {
            return redirect()->route('posts.index');
        }

        $posts = Post::where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');   
        })->get();

        return view('search.post', compact('posts'));
    }

    public function search_user(Request $request) {

        $search = $request->input('search');

        if (empty($search)) {
            return redirect()->route('users.index');
        }

        $users = User::where(function ($query) use ($search) {
            $query->where('email', 'like', '%' . $search . '%')
                ->orWhere('username', 'like', '%' . $search . '%');
        })->get();

        return view('search.user', compact('users'));
    }

    public function search_place(Request $request) {

        $search = $request->input('search');

        if (empty($search)) {
            return redirect()->route('places.index');
        }

        $places = Place::where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        })->get();
        return view('search.place', compact('places'));
    }
}