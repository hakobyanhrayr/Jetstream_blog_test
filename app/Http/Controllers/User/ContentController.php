<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\user\Category;
use App\Models\user\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * @param Category $category
     * @return Application|Factory|View
     */
    public function category(Category $category): View|Factory|Application
    {
        $posts = $category->posts();

        return view('user.pivot',compact('posts'));
    }

    /**
     * @param Tag $tag
     * @return View
     */
    public function tag(Tag $tag):View
    {
        $posts = $tag->posts();

        return view('user.pivot',compact('posts'));
    }
}
