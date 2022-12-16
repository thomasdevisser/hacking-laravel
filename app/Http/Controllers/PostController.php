<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function renderForm() {
        return view('create-post');
    }

    public function create(Request $request) {
        $incomingFields = $request->validate([
            'title' => [
                'required',
                'min:4',
                'max:50',
            ],
            'body' => [
                'required',
                'min:4',
            ]
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        $post = Post::create($incomingFields);

        return redirect("/posts/{$post->id}")->with('success', 'Post created successfully!');
    }

    public function renderPost(Post $post) {
        return view('single-post', ['post' => $post]);
    }
}
