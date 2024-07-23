<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        $title =  "Create Post";
        return view('posts.create', compact('title'));
    }
}
