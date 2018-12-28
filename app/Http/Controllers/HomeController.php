<?php

namespace App\Http\Controllers;


use App\Post;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);


        return view('frontend.home')->with('posts', $posts);
    }
}
