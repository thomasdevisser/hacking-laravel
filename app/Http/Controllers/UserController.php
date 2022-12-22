<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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

        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/')->with('success', 'Thanks for signing up. You are now logged in');
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
            return redirect('/')->with('success', 'You are now logged in.');
        } else {
            return redirect('/')->with('error', 'Invalid credentials.' );
        }
    }

    public function logout(Request $request) {
        auth()->logout();
        return redirect('/')->with('success', 'You are now logged out.');
    }

    public function homepage(Request $request) {
        if (auth()->check()) {
            return view('home');
        } else {
            return view('home-guest');
        }
    }

    public function renderProfile(User $user) {
        $isFollowing = false;

        if (auth()->check()) {
            $isFollowing = Follow::where([
                ['user_id', '=', auth()->user()->id],
                ['followed_user', '=', $user->id]
            ])->count();
        }

        $followerCount = Follow::where([
            ['followed_user', '=', $user->id],
        ])->count();

        $followsCount = Follow::where([
            ['user_id', '=', $user->id]
        ])->count();
        
        $posts = $user->posts()->get();
        return view('profile-posts', [
            'username' => $user->username,
            'avatar' => $user->avatar,
            'posts' => $posts,
            'postCount' => $posts->count(),
            'isFollowing' => $isFollowing,
            'followerCount' => $followerCount,
            'followsCount' => $followsCount,
        ]);
    }

    public function renderProfileFollowers(User $user) {
        $isFollowing = false;

        if (auth()->check()) {
            $isFollowing = Follow::where([
                ['user_id', '=', auth()->user()->id],
                ['followed_user', '=', $user->id]
            ])->count();
        }

        $followerCount = Follow::where([
            ['followed_user', '=', $user->id],
        ])->count();

        $followsCount = Follow::where([
            ['user_id', '=', $user->id]
        ])->count();
        
        $posts = $user->posts()->get();
        return view('profile-followers', [
            'username' => $user->username,
            'avatar' => $user->avatar,
            'postCount' => $posts->count(),
            'isFollowing' => $isFollowing,
            'followerCount' => $followerCount,
            'followsCount' => $followsCount,
        ]);
    }

    public function renderProfileFollowing(User $user) {
        $isFollowing = false;

        if (auth()->check()) {
            $isFollowing = Follow::where([
                ['user_id', '=', auth()->user()->id],
                ['followed_user', '=', $user->id]
            ])->count();
        }

        $followerCount = Follow::where([
            ['followed_user', '=', $user->id],
        ])->count();

        $followsCount = Follow::where([
            ['user_id', '=', $user->id]
        ])->count();
        
        $posts = $user->posts()->get();
        return view('profile-following', [
            'username' => $user->username,
            'avatar' => $user->avatar,
            'postCount' => $posts->count(),
            'isFollowing' => $isFollowing,
            'followerCount' => $followerCount,
            'followsCount' => $followsCount,
        ]);
    }

    public function renderProfileImageForm() {
        return view('profile-image-form');
    }

    public function updateProfileImage(Request $request) {
        $request->validate([
            'profile-image' => 'required|image|max:3000',
        ]);

        $user = auth()->user();

        $filename = $user->id . '-' . uniqid() . '.jpg';

        $imageData = Image::make($request->file('profile-image'))->fit(120)->encode('jpg');
        Storage::put("public/profile-images/$filename", $imageData);

        $currentImage = $user->avatar;

        $user->avatar = $filename;
        $user->save();

        if ($currentImage != "/storage/profile-images/fallback-profile-image.jpeg") {
            $imagePath = str_replace('/storage/', 'public/', $currentImage);
            Storage::delete($imagePath);
        }

        return redirect("/profile/$user->username")->with('success', 'Profile image updated successfully!');
    }
}
