<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // Display all tags
    public function index() {
        $tags = Tag::all();
        return view('posts.tags.index', compact('tags'));
    }

    // Display a single tag with all posts that have that tag
    public function show(Tag $tag) {
        $posts = $tag->posts()->latest()->paginate(20);
        return view('posts.tags.show', compact('tag', 'posts'));
    }

    // Display form to create a new tag
    public function create() {
        return view('posts.tags.add');
    }

    // Store a new tag in the database if it doesn't already exist
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:15|unique:tags,name',
            'color' => 'required|max:15',
        ]);

        $tag = Tag::firstOrCreate([
            'name' => $request->input('name'),
            'color' => $request->input('color'),
        ]);

        return redirect()->route('posts.tags.index', $tag);
    }

    // Display form to edit existing tag
    public function edit(Tag $tag) {
        return view('posts.tags.edit', compact('tag'));
    }

    // Update existing tag in the database
    public function update(Request $request, Tag $tag) {
        $request->validate([
            'name' => 'required|max:15|unique:tags,name',
            'color' => 'required|max:15',
        ]);

        $tag->name = $request->input('name');
        $tag->color = $request->input('color');
        $tag->save();

        return redirect()->route('posts.tags.show', $tag);
    }

    // Delete existing tag from the database
    public function destroy(Tag $tag) {
        $tag->delete();

        return redirect()->route('posts.tags.index');
    }

    // Search for a tag
    public function search(Request $request) {
        $request->validate([
            'query' => 'required|max:255',
        ]);

        $query = $request->input('query');
        $tags = Tag::where('name', 'like', "%$query%")->get();

        return view('posts.tags.search', compact('tags', 'query'));
    }

    // Display all users who have used a specific tag in their posts
    public function users(Tag $tag) {
        $users = $tag->posts()->with('user')->get()->pluck('user')->unique();
        return view('posts.tags.users', compact('tag', 'users'));
    }

    // Return all tags in json format
    public function json() {
        $tags = Tag::all();
        return response()->json($tags);
    }
}
