<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function follow(User $user) {
        if ($user->id === auth()->user()->id) return back()->with('error', 'You can\'t follow yourself.');

        $isFollowing = Follow::where([
            ['user_id', '=', auth()->user()->id],
            ['followed_user', '=', $user->id]
        ])->count();

        if ($isFollowing) return back()->with('error', 'You\'re already following this user.');

        $newFollow = new Follow;
        $newFollow->user_id = auth()->user()->id;
        $newFollow->followed_user = $user->id;
        $newFollow->save();
        return back()->with('success', 'Followed successfully.');
    }

    public function unfollow(User $user) {
        if ($user->id === auth()->user()->id) return back()->with('error', 'You can\'t unfollow yourself.');

        $isFollowing = Follow::where([
            ['user_id', '=', auth()->user()->id],
            ['followed_user', '=', $user->id]
        ])->count();

        if (!$isFollowing) return back()->with('error', 'You\'re not following this user.');

        Follow::where([
            ['user_id', '=', auth()->user()->id],
            ['followed_user', '=', $user->id]
        ])->delete();

        return back()->with('success', 'Unfollowed successfully.');
    }
}
