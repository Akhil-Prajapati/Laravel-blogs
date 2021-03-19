<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Blog;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Blog $blog)
    {
        // dd($blog->comments()->latest()->get());
        $comments = $blog->comments()->latest()->get();
        return view('blogs.comments.index',['blog' => $blog, 'comments' => $comments ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Blog $blog)
    {
        // Auth::check();
        $user_id = null;
        if (auth()->check()) {
            $user_id = auth()->user()->id;
        }
        // dd($user_id);
        $request->validate([
            'text' => 'required|string',
        ]);
        Comment::create([
            "text" => $request->get('text'),
            "user_id" => $user_id,
            "blog_id" => $blog->id
        ]);

        return redirect()->back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog, Comment $comment)
    {
        // dd($blog, $comment);
        $comment->delete();
        // Comment::find($id)->delete();
        return redirect()->back();
    }
}
