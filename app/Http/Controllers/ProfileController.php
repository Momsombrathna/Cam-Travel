<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function showProfile($id)
    {
        $user = User::findOrFail($id);

        return view('home.profile', compact('user'));
    }
}
