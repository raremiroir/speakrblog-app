<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    // Display all posts
    public function index() {
        $posts = Post::with('user')->latest()->paginate(20);
        return view('posts.index', compact('posts'));
    }

    // Display form to create a new post
    public function create(Request $request): View {
        return view('posts.add', [
            'user' => $request->user(),
        ]);
    }

    // Store a new post in the database
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        // $post->user_id = auth()->user()->id;
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->route('posts.show', $post);
    }

    // Display a single post
    public function show(Post $post) {
        // $post->load('comments.user');
        $comments = $post->comments()->with('user')->get();
        return view('posts.show', compact('post', 'comments'));
    }

    // Display form to edit existing post
    public function edit(Post $post) {
        return view('posts.edit', compact('post'));
    }

    // Update existing post in the database
    public function update(Request $request, Post $post) {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect()->route('posts.show', $post);
    }

    // Delete a post
    public function destroy(Post $post) {  
        $post->delete();
        return redirect()->route('posts.index');
    }

    // Like a post
    public function like(Post $post) {
        auth()->user()->likedPosts()->syncWithoutDetaching($post->id);
        return back();
    }
    // Unlike a post
    public function unlike(Post $post) {
        auth()->user()->likedPosts()->detach($post->id);
        return back();
    }

    // Search for posts
    public function search(Request $request) {
        $search = $request->input('search');
        $posts = Post::search($search)->get();
        $users = User::search($search)->get();
        return view('search', compact('posts', 'users', 'search'));
    }
}
