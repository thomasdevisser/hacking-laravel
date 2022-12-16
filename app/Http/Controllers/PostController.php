<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function renderForm() {
        return view("create-post");
    }

    public function create(Request $request) {

    }
}
