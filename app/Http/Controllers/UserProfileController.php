<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Cart;
use App\Models\Place;
use App\Models\Post;
use App\Models\SavePlace;

class UserProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $posts = Post::where('user_id', auth()->user()->id)->get();
        $places = Place::where('user_id', auth()->user()->id)->get();
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $save_places = SavePlace::where('user_id', auth()->user()->id)->get();

        return view('profile.index', compact('user', 'posts', 'places', 'carts', 'save_places'));
    }

    // public function showpost()
    // {
    //     $posts = Post::where('user_id', auth()->user()->id)->get();

    //     return view('profile.index', compact('posts'));
    // }

    public function edit()
    {
        $user = auth()->user();

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'username' => 'nullable|max:18',
            'image'    => 'required|max:655',
            'phone'    => 'required|max:12',
            'address'  => 'required|max:191',
        ]);

        $user = $request->user();
        $user->name = $request->name;
        $user->image = $request->image;
        $user->phone = $request->phone;
        $user->address = $request->address;

        $user->save();

        return redirect()->route('profile.index');
    }
}