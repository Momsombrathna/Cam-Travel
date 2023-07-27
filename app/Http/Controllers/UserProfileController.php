<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UserProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:191',
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