<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\user\Category;
use App\Models\user\Post;
use App\Models\user\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $posts = Post::get();

        return view('admin.post.show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $tags = Tag::get();

        $categories = Category::query()->get();

        return view('admin.post.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $post = Post::query()->create($request->only([
            'title',
            'subtitle',
            'slug',
            'body',
            'publish',
            'status',
        ]));

//        $path = $request->file('image')->store('public/images');

//        $path = Storage::putFile('public/images', $request->file('image'));

        $path = Storage::disk('local')->put('public/images', $request->file('image'));

        $post->image = $path;

        $post->tags()->sync($request->tag);

        $post->categories()->sync($request->category);

        $post->status = $request->status;

        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show(int $id): View|Factory|Application
    {
        $post = Post::query()->find($id);

        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View|Factory|Application
    {
        //findorfail
        $post = Post::with('tags', 'categories')->where('id', $id)->first();

        //cursor, get, all
        $tags = Tag::get();

        $categories = Category::get();

        return view('admin.post.edit', compact('post', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(PostRequest $request, int $id): RedirectResponse
    {
        $post = Post::query()->findOrFail($id);

        $post->update($request->only([
            'title',
            'subtitle',
            'body',
            'publish',
            'status',
        ]));

        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/images');
        };

        $post->image = $imageName;

        $post->tags()->sync($request->tags);

        $post->categories()->sync($request->categories);

        $post->save();

        return redirect()->route('post.index')->with('message', 'Post update SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $post = Post::query()->findOrFail($id);

        $post->delete();

        return redirect()->route('post.index');
    }
}
