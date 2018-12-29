<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Post;
use App\Category;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    /**
     * Return count of posts, categories and users for the Dashboard
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.dashboard')->with([
            'posts' => Post::all()->count(),
            'categories' => Category::all()->count(),
            'users' => User::all()->count(),
        ]);
    }
}
