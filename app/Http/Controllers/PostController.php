<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
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
        $tags = Tag::all();
        $user = $request->user();

        return view('posts.add', compact('tags', 'user'));
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
        $post->user_id = Auth::id();
        $post->save();

        $post->tags()->sync($request->input('tags') ?: []);

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

        $tags = Tag::all();

        return view('posts.edit', compact('post', 'tags'));
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

        $post->tags()->sync($request->input('tags') ?: []);

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

    // Display posts by a specific user
    public function userPosts(User $user) {
        $posts = $user->posts()->with('user')->latest()->paginate(20);
        return view('posts.index', compact('posts'));
    }

    // Display posts by a specific tag
    public function tagPosts(Tag $tag) {
        $posts = $tag->posts()->with('user')->latest()->paginate(20);
        return view('posts.index', compact('posts'));
    }

    // Display posts by a specific user and tag
    public function userTagPosts(User $user, Tag $tag) {
        $posts = $user->posts()->whereHas('tags', function ($query) use ($tag) {
            $query->where('tags.id', $tag->id);
        })->with('user')->latest()->paginate(20);
        return view('posts.index', compact('posts'));
    }

    // Display all tags for a specific post
    public function tags(Post $post) {

        $tags = [];
        foreach ($post->tags as $tag) {
            $tags[] = $tag->pivot->name;
        }
        return view('posts.tags.index', compact('tags'));
    }

    
}
