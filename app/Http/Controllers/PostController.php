<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function renderForm() {
        return view('create-post');
    }

    public function renderEditForm(Post $post) {
        return view('edit-post', ['post' => $post]);
    }

    public function renderPost(Post $post) {
        $post['body'] = Str::markdown($post['body']);
        return view('single-post', ['post' => $post]);
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

    public function delete(Post $post) {
        $post->delete();
        return redirect('/profile/' . auth()->user()->username)->with('success', 'Post deleted successfully!');
    }

    public function update(Post $post, Request $request) {
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

        $post->update($incomingFields);
        return redirect("/posts/$post->id")->with('success', 'Post updated successfully!');
    }
}
