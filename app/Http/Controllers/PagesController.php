<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home_page()
    {
        $title = "King's Blog - Get the latest information";
        return view('welcome', compact('title'));
    }
}
