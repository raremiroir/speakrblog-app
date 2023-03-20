<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display all users
    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Display a single user
    public function show(User $user) {
        return view('users.show', compact('user'));
    }

    // Follow a user
    public function follow(User $user) {
        auth()->user()->follow($user);
        return back();
    }
}
