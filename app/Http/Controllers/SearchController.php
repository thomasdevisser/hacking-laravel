<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($term) {
        $results = Post::search($term)->get();
        $results->load('user:id,username,avatar');
        return $results;
    }
}
