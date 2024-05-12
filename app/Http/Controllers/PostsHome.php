<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsHome extends Controller
{
    
    public function index(){
        return view('layouts_home.welcome', [
            'posts' => Posts::all(),
            'pageTitle' => 'Home'
        ]);
    }

    public function show(Request $request, string $slug){

        $post = Posts::where('slug', $slug)->firstOrFail();
        return view('layouts_home.single_post', [
            'posts' => Posts::all(),
            'post' => $post,
            'pageTitle' => 'Home'
        ]);
    }
}
