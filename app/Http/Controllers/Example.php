<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Example extends Controller
{
    public function homepage() {
        return view("home-guest");
    }

    public function post() {
        return view("single-post");
    }
}
