<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index()
    {
        $title = "My Posts";
        $posts = Post::all();
        return view('posts.all-posts', compact('title', 'posts'));
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

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {

        $post = Post::findOrFail($id);
        $oldImage = public_path('uploads/'. $post->cover);

        $request->validate([
            'title' => "required|string|unique:posts,title,{$id}|max:255",
            'cover_image' => "nullable|image|mimes:png,jpg,jpeg,gif|max:2048",
            'content' => "required|string"
        ]);

        // Create a slug from the title
        $slug = Str::slug($request->input('title'));


        if ($request->hasFile('cover_image')) {
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

            Post::where('id', '=', $id)->update([
                'title' => $request->input('title'),
                'slug' => $slug,
                'cover' => $filename,
                'content' => $request->input('content')
            ]);

            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
        } else {
            Post::where('id', '=', $id)->update([
                'title' => $request->input('title'),
                'slug' => $slug,
                'content' => $request->input('content')
            ]);
        }


        Alert::success('Post Updated', "Your post has been updated successfully");
        return back();
    }
    
    
    public function delete($id)
    {
        Post::where('id', '=', $id)->delete();
        Alert::success('Post Deleted', "Your post has been deleted successfully");
        return back();
    }
}
