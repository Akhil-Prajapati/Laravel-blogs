<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = auth()->user()->blogs;
        // $comments = $blogs->comments;
        return view('blogs.blog.index',['blogs' => $blogs ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'mimes:jpeg,png',
        ]);
        $name = $request->image->getClientOriginalName();
        $request->image->storeAs('/public', $name);
        // $url = url($name);
        $url = \Storage::url($name);
        Blog::create([
            "title" => $request->get('title'),
            "body" => $request->get('body'),
            'url' => $url,
            "user_id" => auth()->user()->id
        ]);

        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blogs.blog.edit',['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);
        $blog = Blog::find($id);
        $blog->update([
            "title" => $request->get('title'),
            "body" => $request->get('body'),
            "user_id" => auth()->user()->id
        ]);
        $blogs = auth()->user()->blogs;
        return redirect()->route('blogs.index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        return redirect()->route('blogs.index');
    }
}
