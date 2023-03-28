<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    // Display all users.
    public function index(Request $request): View {
        $users = User::paginate(20);
        return view('profile.index', [
            'user' => $request->user(),
            'users' => $users,
        ]);
    }

    // Display a user's profile.
    public function show(Request $request, User $user): View {
        $posts = Post::where('user_id', $user->id)->latest()->paginate(20);
        return view('profile.show', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    // Display the user's profile.
    public function edit(Request $request): View {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    // Update the user's profile.
    public function update(ProfileUpdateRequest $request): RedirectResponse {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    // Update user's avatar.
    public function updateAvatar(Request $request): RedirectResponse {
        $request->user()->changeAvatar($request->input('avatar'));
        // Remove temp_image_filepath from session
        $request->session()->forget('temp_image_filepath');
        return Redirect::route('profile.edit')->with('status', 'avatar-updated');
    }

    // Confirm that the user would like to delete their account.
    public function destroy(Request $request): RedirectResponse {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        // Softdelete user
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    // Display the user's followers and following.
    public function friends(Request $request, User $user): View {
        $followers = $user->followers()->paginate(20);
        $following = $user->following()->paginate(20);
        return view('profile.friends', [
            'user' => $user,
            'followers' => $followers,
            'following' => $following,
        ]);
    }

    // Follow another user
    public function follow(Request $request, User $user): RedirectResponse {
        // If user is trying to follow themselves, redirect back.
        if ($request->user()->is($user)) {
            return Redirect::back();
        }

        $request->user()->follow($user);
        
        return Redirect::back();
    }
    // Unfollow another user
    public function unfollow(Request $request, User $user): RedirectResponse {
        // If user is trying to follow themselves, redirect back.
        if ($request->user()->is($user)) {
            return Redirect::back();
        }

        $request->user()->unfollow($user);

        return Redirect::back();
    }
}
