<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Support\DefaultPermissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:' . DefaultPermissions::VIEW_POST, ['only' => ['index', 'show']]);
        $this->middleware('can:' . DefaultPermissions::CREATE_POST, ['only' => ['create', 'store']]);
        $this->middleware('can:' . DefaultPermissions::UPDATE_POST, ['only' => ['edit', 'update']]);
        $this->middleware('can:' . DefaultPermissions::DELETE_POST, ['only' => ['destroy']]);

    }

    public function index()
    {
        $posts = Post::all();
        return Inertia::render('Admin/Post/List', ['posts'=> $posts
    ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Post/Create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     // 'slug' => 'required|string|max:255',
        //     'content' => 'required',
        // ]);

        Post::create($request->all());
        // sleep(1);

        $msg = "New post created";
        return redirect('posts')->with('msg', $msg);
    }

    public function show(Post $post)
    {
        return Inertia::render('Admin/Posts/ViewPost', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return Inertia::render(
            'Admin/Post/Edit',
            [
                'post' => $post
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $post->title = $request->title;
        $post->slug = Str::slug($request->slug);
        $post->content = $request->content;
        $post->save();
        sleep(1);

        return redirect()->route('posts.index')->with('message', 'Blog Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        sleep(1);

        return redirect()->route('posts.index')->with('message', 'Blog Delete Successfully');
    }
}
