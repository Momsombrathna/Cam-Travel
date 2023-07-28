<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Place;
use App\Models\User;
use Carbon\Carbon;

class UploadPlaceController extends Controller
{
    //
    // public function index () {
    //     return view('uploadphoto.index');
    // }

    public function index()
    {
        $place = Place::where('user_id', auth()->user()->id)->get();

        return view('profile.index', compact('places'));
    }

    public function create()
    {
        $users = User::all();

        return view('uploadplace.create', compact('users'));
    }

    public function store(Request $request)
    {
        $place = new Place();
        $place->title = $request->input('title');
        $place->description = $request->input('description');
        $place->image = $request->input('image');
        $place->images = $request->input('images');
        $place->imagess = $request->input('images');
        $place->location = $request->input('location');
        $place->user_id = auth()->user()->id;

        $today = Carbon::today();
        $count = Place::where('user_id', auth()->user()->id)->whereDate('created_at', $today)->count();

        if ($count >= 2) {
            return redirect()->route('profile.index')
                ->withError(__('You can only uploads 2 posts per day.'));
        }

        $place->save();
    }

    public function show(Place $place)
    {
        $user = $place->user;
    

        return view('uploadplace.show', compact('place', 'user'));
    }

    public function edit(Place $place)
    {
        return view('uploadplace.edit', [
            'post' => $place
        ]);
    }

    public function update(Request $request, Place $place)
    {
        $place->update($request->only('title', 'description', 'image', 'images', 'imagess', 'location'));

        return redirect()->route('profile.index')
            ->withSuccess(__('Post updated successfully.'));
    }

    public function destroy(Place $place)
    {
        $place->delete();

        return redirect()->route('profile.index')
            ->withSuccess(__('Post deleted successfully.'));
    }
}
