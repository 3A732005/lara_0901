<?php

namespace App\Http\Controllers;

use App\Models\Post;

class AdminPostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        $data = ['posts' => $posts];
        return view('admin.posts.index', $data);
    }

    public function create()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        $data = ['posts' => $posts];
        return view('admin.posts.create', $data);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $data = ['post' => $post];
        return view('admin.posts.edit', $data);
    }

    public function store(\Illuminate\Http\Request $request)
    {
        Post::create($request -> all());
        return redirect()->route('admin.posts.index');
    }

    public function update(\Illuminate\Http\Request $request,$id)
    {
        $posts = Post::find($id);
        $posts->update($request->all());
        return redirect()->route('admin.posts.index');
    }
}
