<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $places = Place::where('user_id', auth()->user()->id)->get();

        return view('profile.index', compact('posts'));
    }

    public function create()
    {
        $users = User::all();

        return view('uploadplace.create', compact('users'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:70',
            'description' => 'required|string|max:800',
            'image' => 'required|url',
            'images' => 'required|url',
            'imagess' => 'required|url',
            'location' => 'required|string'
        ]);

        $place = new Place();
        $place->title = $request->input('title');
        $place->description = $request->input('description');
        $place->image = $request->input('image');
        $place->images = $request->input('images');
        $place->imagess = $request->input('imagess');
        $place->location = $request->input('location');
        $place->user_id = auth()->user()->id;

        $today = Carbon::today();
        $count = Place::where('user_id', auth()->user()->id)->whereDate('created_at', $today)->count();

        if ($count >= 2) {
            return redirect()->route('profile.index')
                ->withError(__('You can only uploads 2 places per day.'));
        }

        $place->save();

        return redirect()->route('profile.index');
    }

    public function show(Place $place)
    {
        $user = $place->user;

        return view('uploadplace.show', compact('place', 'user'));
    }

    public function edit(Place $place)
    {
        // Check if the user is authorized to edit the post
        $this->authorize('update', $place);
    
        return view('uploadplace.edit', [
            'place' => $place
        ]);
    }

    public function update(Request $request, Place $place)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:70',
            'description' => 'required|string|max:290',
            'image' => 'required|url',
            'images' => 'required|url',
            'imagess' => 'required|url',
            'location' => 'required|string'
        ]);

        // Fill the post attributes with the request data
        $place->fill($request->all());

        // Save the updated post to the database
        $place->save();

        return redirect()->route('profile.index')
            ->withSuccess(__('Post updated successfully.'));
    }

    public function destroy(Place $place)
    {
        // Check if the user is authorized to edit the post
        $this->authorize('update', $place);
        
        $place->delete();

        return redirect()->route('profile.index')
            ->withSuccess(__('Post deleted successfully.'));
    }
}
