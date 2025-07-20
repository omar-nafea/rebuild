<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts, 'PageTitle' => 'Posts']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create', ['PageTitle' => 'Create Post']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        //
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->isPublished = $request->input('isPublished') === 'on';
        $post->writer_id = $request->input('writer_id');
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post, 'PageTitle' => $post->title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post, 'PageTitle' => 'Edit Post']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $post = Post::findOrFail($id);
        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Post not found.');
        }
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->isPublished = $request->input('isPublished') === 'on';
        $post->writer_id = $request->input('writer_id');
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::findOrFail($id);
        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Post not found.');
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
