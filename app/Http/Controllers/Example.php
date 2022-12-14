<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Example extends Controller
{
    public function homepage() {
        $pageTitle = 'Homepage | Laravel';
        $posts = [
            "Hello Laravel",
            "Learning Blade",
            "Controllers are cool"
        ];

        $payload = [
            'pageTitle' => $pageTitle,
            'posts' => $posts
        ];

        return view("homepage", $payload);
    }
}
