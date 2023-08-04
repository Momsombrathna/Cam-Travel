<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();

        return view('photo.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $user = $post->user;
    
        return view('photo.show', compact('post', 'user'));
    }

    public function download($id)
    {
        // Find the post by id
        $post = Post::findOrFail($id);

        // Get the image path from the post
        $imagePath = $post->image;

        // Check if the image exists
        if (!Storage::exists($imagePath)) {
            abort(404);
        }

        // Get the file name
        $fileName = basename($imagePath);

        // Download the image using the Storage facade
        $file = Storage::download($imagePath, $fileName);

        $tempFile = tempnam(sys_get_temp_dir(), 'image');

        // Delete the temporary file
        if (file_exists($tempFile)) {
            unlink($tempFile);
        }

        // Return the file object
        return $file;
    }



}
