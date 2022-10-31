<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;

// Asa
use Auth;
// Asa

class BlogController extends Controller
{
    // This method for Protecting Admin Route
    public function __construct() {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        // ---Secure by Helping function---
        if(Auth::user()->isAdminOrEditor()) {
            // $pages = Page::all();
            $posts = Post::paginate(5);
        }
        else {
            // $pages = Auth::user()->pages()->get();
            $posts = Auth::user()->posts()->paginate(5);
        }
        return view('admin.blog.index', ['model' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create')->with('model', new Post());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(StoreBlogRequest $request)
    {
        Auth::user()->posts()->save(
            new Post($request->only(['title', 'slug',
            'published_at', 'excerpt', 'body']))
        );

        return redirect()->route('blog.index')->with('status', 'The post was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // public function edit(Post $post)
    public function edit(Post $blog)
    {
        return view('admin.blog.edit')->with('model', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Post $blog)
    {
        if(Auth::user()->cant('update', $blog)) {
            return redirect()->route('blog.index')->with('status', 'You do not have permission to edit that post');
        }

        $blog->fill($request->only(['title', 'slug', 'published_at',
         'excerpt', 'body']))->save();
        return redirect()->route('blog.index')->with('status', 'the post was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $blog)
    {
        if(Auth::user()->cant('delete', $blog)) {
            return redirect()->route('blog.index')->with('status', 'You dont have the premission to delete the post');
        }

        $blog->delete();

        return redirect()->route('blog.index')->with('status', 'The post was deleted');
    }
}
