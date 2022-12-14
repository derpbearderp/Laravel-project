<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::where('spoiler', 0)->get();
        return view('welcome', compact('posts'));
    }

    public function spoiler()
    {

        $posts = Post::where('spoiler', 1)->get();
        return view('welcome', compact('posts'));
    }


    public function search(Request $request)
    {
        if ($request->has('spoiler')) {
            $search = $request->input('search');


            $posts = Post::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->Where('spoiler', 'LIKE', 1)
                ->orWhere('content', 'LIKE', "%{$search}%")
                ->Where('spoiler', 'LIKE', 1)
                ->get();

            return view('welcome', compact('posts'));
        } else{
            $search = $request->input('search');


            $posts = Post::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->Where('spoiler', 'LIKE', 0)
                ->orWhere('content', 'LIKE', "%{$search}%")
                ->Where('spoiler', 'LIKE', 0)
                ->get();

            return view('welcome', compact('posts'));
            }
        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'spoiler',
            'user_id'

        ]);

        Post::create($request->all());


        return redirect()->route('posts.index')
            ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',

        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success','Post updated successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function myth(Request $request, Post $post)
    {
        $request->validate([
            'myth' => 'required',
       ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success','Myth updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
           ->with('success','Post deleted successfully');
    }

}



