<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Display all comments
    public function index()
    {
        //
    }

    // Display form to create a new comment
    public function create()
    {
        //
    }

    // Store a new comment in the database
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->user_id = Auth::id();

        if ($request->has('parent_id')) {
            $comment->parent_id = $request->input('parent_id');
        }

        $post->comments()->save($comment);

        return redirect()->back();
    }

    // Display a single comment
    public function show(Comment $comment)
    {
        //
    }

    // Display form to edit existing comment
    public function edit(Post $post, Comment $comment)
    {
        return view('comments.edit', compact('post', 'comment'));
    }

    // Update existing comment in the database
    public function update(Request $request, Post $post, Comment $comment)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $comment->body = $request->input('body');
        $comment->save();

        return redirect()->route('posts.show', $post);
    }

    // Delete existing comment from the database
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return redirect()->back();
        // return redirect()->route('posts.show', $post);
    }

    // Like a comment
    public function like(Post $post, Comment $comment)
    {
        auth()->user()->likedComments()->syncWithoutDetaching($comment->id);
        return back();
    }
    // Unlike a comment
    public function unlike(Post $post, Comment $comment)
    {
        auth()->user()->likedComments()->detach($comment->id);
        return back();
    }
}
