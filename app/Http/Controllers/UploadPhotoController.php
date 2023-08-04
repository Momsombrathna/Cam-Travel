<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Cart;


class UploadPhotoController extends Controller
{
    //
    // public function index () {
    //     return view('uploadphoto.index');
    // }

    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->get();

        return view('profile.index', compact('posts'));
    }

    public function create()
    {
        $users = User::all();

        return view('uploadphoto.create', compact('users'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:70',
            'description' => 'required|string|max:800',
            'image' => 'required|url',
            'location' => 'required|string'
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->image = $request->input('image');
        $post->location = $request->input('location');
        $post->user_id = auth()->user()->id;

        $today = Carbon::today();
        $count = Post::where('user_id', auth()->user()->id)->whereDate('created_at', $today)->count();

        if ($count >= 2) {
            return redirect()->route('profile.index')
                ->withError(__('You can only uploads 2 posts per day.'));
        }

        $post->save();

        return redirect()->route('profile.index');
    }

    public function show(Post $post)
    {
        $user = $post->user;

        return view('uploadphoto.show', compact('post', 'user'));
    }

    // show card
    public function showcart(Post $post)
    {
        $user = $post->user;
        $cart = Cart::where('user_id', auth()->user()->id)->where('post_id', $post->id)->first();

        return view('uploadphoto.showcart', compact('post', 'user', 'cart'));
    }

    public function edit(Post $post)
    {
        // Check if the user is authorized to edit the post
        $this->authorize('update', $post);
    
        return view('uploadphoto.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:70',
            'description' => 'required|string|max:800',
            'image' => 'required|url',
            'location' => 'required|string'
        ]);

        // Fill the post attributes with the request data
        $post->fill($request->all());

        // Save the updated post to the database
        $post->save();

        return redirect()->route('profile.index')
            ->withSuccess(__('Post updated successfully.'));
    }

    public function destroy(Post $post)
    {
        // Check if the user is authorized to edit the post
        $this->authorize('update', $post);
        
        $post->delete();

        return redirect()->route('profile.index')
            ->withSuccess(__('Post deleted successfully.'));
    }

    public function addToCart(Post $post)
    {
        // Check if the user has carts
        if (auth()->user()->carts && auth()->user()->carts->count() > 0) {
            // The user has carts
            // Check if the post is already in their cart
            if (auth()->user()->carts->contains('post_id', $post->id)) {
                return redirect()->route('photo.show', $post->id)
                    ->withError(__('Post already in your cart.'));
            }
        }

        // Create a new Cart instance
        $cart = new Cart();
        $cart->user_id = auth()->user()->id;
        $cart->post_id = $post->id;

        // Save the Cart instance to the database
        $cart->save();

        return redirect()->route('photo.show', $post->id)
            ->withSuccess(__('Post added to cart successfully.'));
    }

    public function destroycart(Cart $cart)
    {  
        // Check if the user is authorized to edit the post
        $this->authorize('update', $cart);
        
        $cart->delete();

        return redirect()->route('profile.index')
            ->withSuccess(__('Post deleted successfully.'));
    }

}