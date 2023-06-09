<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => [
                'required', 'string',  
                'min:3',    // min 3 characters
                'max:20',   // max 20 characters
                'regex:/^(?=.*[a-zA-Z].*[a-zA-Z])[a-zA-Z0-9._-]+$/' , // must contain at least 2 letters, no special characters except . _ - and digits
                'unique:'.User::class // must be unique
            ],
            'email' => [ 'required', 'string', 'email', 'max:255', 'unique:'.User::class ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => 'https://source.boringavatars.com/beam/150/' . $request->username . '?colors=a9ddaa,d1d5db,8fb4da,f3a2a2,ffd575',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
