<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFormRequest $request)
    {
        $validated = $request->validated();
            
        $post = $request->user()->posts()->create($validated);
    
        return redirect()
            ->route('posts.create')
            ->with(
                'success' , "Post is submitted! Title: {$post->title} Description: {$post->description}"
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('posts.show', ['post' => Post::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('posts.edit', ['post' => Post::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostFormRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post->update($validated);

        $post->save();

        return redirect()
            ->route('posts.edit', ['post' => $post->id])
            ->with('success', 'Post is updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()
            ->route('home')
            ->with('success', 'Post is deleted!');
    }
}
