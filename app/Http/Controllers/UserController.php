<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $incomingFields = $request->validate([
            'username' => [
                'required',
                'min:3',
                'max:20',
                Rule::unique('users', 'username')
            ],
            'email' => [
                'required',
                'email',
                'min:4',
                Rule::unique('users', 'email')
            ],
            'password' => [
                'required',
                'min:6',
                'confirmed'
            ],
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);

        User::create($incomingFields);
        return "Registered!";
    }

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'login-username' => 'required',
            'login-password' => 'required',
        ]);

        $loginCredentials = [
            'username' => $incomingFields['login-username'],
            'password' => $incomingFields['login-password']
        ];

        if (auth()->attempt($loginCredentials)) {
            $request->session()->regenerate();
            return view("home-no-results");
        } else {
            return "Wrong pass!";
        }
    }

    public function logout(Request $request) {
        auth()->logout();
        return redirect("/");
    }

    public function homepage(Request $request) {
        if (auth()->check()) {
            return view("home-no-results");
        } else {
            return view("home-guest");
        }
    }
}
