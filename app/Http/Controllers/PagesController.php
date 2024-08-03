<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home_page()
    {
        $title = "King's Blog - Get the latest information";
        // $posts = Post::all()->sortBy('title');
        // $posts = Post::all()->sortByDesc('title');
        $posts = Post::all()->sortByDesc('created_at')->take(6);
    
        return view('welcome', compact('title', 'posts'));
    }

    public function show_posts ()
    {
        // $posts = Post::latest()->take(2)->get();
        $posts = Post::latest()->paginate(6);
        return view('posts.guest-posts', compact('posts'));
    }

    public function read_post($slug)
    {
        // $post  = Post::where('slug', '=', $slug)->first();
        $post  = Post::where('slug', '=', $slug)->firstOrFail();

        $title = $post->title;
        return view('posts.read', compact('post', 'title'));
    }
}
