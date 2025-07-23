<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request)
    {
    $request->validate([
        'content' => 'required',
        'author' => 'required',
        'post_id' => 'required|exists:posts,id',
    ]);

    Comment::create([
        'content' => $request->input('content'),
        'author' => $request->input('author'),
        'post_id' => $request->input('post_id'),
    ]);
    return redirect()->route('posts.show', $request->input('post_id'))->with('success', 'Comment added!');
    }

    /**
     * Display the specified resource.
     */
    
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
