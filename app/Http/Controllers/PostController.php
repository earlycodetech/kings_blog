<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index()
    {
        $title = "My Posts";
        return view('posts.all-posts', compact('title'));
    }
    
    public function create()
    {
        $title =  "Create Post";

        return view('posts.create', compact('title'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => "required|string|unique:posts,title|max:255",
            'cover_image' => "required|image|mimes:png,jpg,jpeg,gif|max:2048",
            'content' => "required|string"
        ]);

        // Create a slug from the title
        $slug = Str::slug($request->input('title'));


        // 1. Retrieve the file from the request
        $file = $request->file('cover_image');

        // 2. Get the extension for the file
        $ext = $file->extension();

        // 3. Create a new name for your file
        $filename = "post_cover_" . time() . '_' . mt_rand() . "." . $ext;

        // 4. Create the folder to store the file
        $directory = "uploads";

        // 5. Move the file to the folder
        $file->move($directory, $filename);

        Post::create([
            'title' => $request->input('title'),
            'slug' => $slug,
            'cover' => $filename,
            'likes' => 0,
            'content' => $request->input('content')
        ]);

        Alert::success('Post Created', "Your post has been created successfully");
        return back();
    }
}
