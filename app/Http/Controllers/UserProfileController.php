<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Post;
use App\Models\Place;
use Carbon\Carbon;


class UserProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $posts = Post::where('user_id', auth()->user()->id)->get();
        $places = Place::where('user_id', auth()->user()->id)->get();

        return view('profile.index', compact('user', 'posts', 'places'));
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
            'image'    => 'required|max:655',
            'phone'    => 'required|max:12',
            'address'  => 'required|max:191',
        ]);
    
    
        $user = $request->user();
        $user->image = $request->image;
        $user->phone = $request->phone;
        $user->address = $request->address;
    
        $today = Carbon::today();
        $last_updated = $user->updated_at;
    
        if ($today->diffInWeeks($last_updated) >= 2) {
            $user->save();
    
            return redirect()->route('profile.index');
        } else {
            return redirect()->route('profile.index')
                ->withError(__('You can only update your profile once per two weeks.'));
        }
    }
}