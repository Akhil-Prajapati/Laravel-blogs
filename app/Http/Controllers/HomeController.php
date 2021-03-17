<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.home',['blogs' => $blogs ]);
    }

    public function show(Blog $blog)
    {
        $comments = $blog->comments()->latest()->take(5)->get();
        return view('blogs.blog',[ 'blog' => $blog, 'comments' => $comments ]);
    }
}
