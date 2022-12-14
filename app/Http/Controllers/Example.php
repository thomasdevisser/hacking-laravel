<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Example extends Controller
{
    public function homepage() {
        return "<h1>Hello from the controller</h1>";
    }
}
