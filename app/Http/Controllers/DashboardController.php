<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Place;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() 
    {
        $user_count = User::count();
        $post_count = Post::count();
        $place_count = Place::count();
        $role_count = DB::table('roles')->count();
        $permission_count = DB::table('permissions')->count();


        return view('dashboard.index', compact('user_count', 'place_count', 'post_count', 'role_count', 'permission_count'));
    }
    
}
