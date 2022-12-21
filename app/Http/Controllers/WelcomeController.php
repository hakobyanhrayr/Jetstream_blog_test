<?php

namespace App\Http\Controllers;

use App\Models\user\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index():View
    {
        return view('home');
    }

    /**
     * @return Application|Factory|View
     */
    public function show()
    {
        $posts = Post::get();

        return view('user.blog',compact('posts'));
    }

//    /**
//     * @return Application|Factory|View
//     */
//    public function posts(): View|Factory|Application
//    {
//        $posts = Post::get();
//
//        return view('user.dashboard',compact('posts'));
//    }
}
