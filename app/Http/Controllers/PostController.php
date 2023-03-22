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
        // Validate the request data
        $request->validate([
            'tags' => 'array|nullable',
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        // Create a new post
        $post = new Post();
        // Assign the required request data to the post
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        // Assign the authenticated user to the post
        $post->user_id = Auth::id();
        // Save the post
        $post->save();
        
        // Get tag id from unique name & assign to post
        if (count($request->input('tags')) > 0) {
            $selectedTags = explode('-', $request->input('tags')[0]) ?: [];
            foreach ($selectedTags as $tag) {
                $tag = trim($tag);
                $tag = Tag::where('name', $tag)->first();
                $post->tags()->attach($tag->id);
            }
        }
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
            'tags' => 'array|nullable',
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        // Remove all tags before assigning them again
        $post->tags()->detach();
        // Get tag id from unique name & assign to post
        if (
            count($request->input('tags')) > 0 
            && strlen($request->input('tags')[0] > 1)
        ) {
            $selectedTags = explode('-', $request->input('tags')[0]) ?: [];
            foreach ($selectedTags as $tag) {
                $tag = trim($tag);
                $tag = Tag::where('name', $tag)->first();
                $post->tags()->attach($tag->id);
            }
        }
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

    // Add tags to a post
    public function addTags(Request $request, Post $post) {
        $request->validate([
            'tags' => 'array|nullable',
        ]);

        $post->assignTags($request->input('tags') ?: []);

        return redirect()->route('posts.show', $post);
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

    // Return all posts in json format
    public function json() {
        $posts = Post::all();
        return response()->json($posts);
    }

    
}
