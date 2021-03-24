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

    public function show(Request $request, Blog $blog)
    {
        $limit = $request->has('comments')?$request->comments:5;
        $comments = $blog->comments()->latest()->take($limit)->get();
        $likes = $blog->likes()->get();
        return view('blogs.blog',[ 'blog' => $blog, 'comments' => $comments, 'limit' => $limit , 'likes' => $likes]);
    }
}
