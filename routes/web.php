<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/posts/create', function () {
    return view('create');
})->name('posts.create');


Route::post('/posts', function (Request $request) {
    $validated = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
    ]);
    
    $title = $validated['title'];
    $description = $validated['description'];

    return redirect()
        ->route('posts.create')
        ->with(
            'success' , "Post is submitted! Title: {$title} Description: {$description}"
        );
})->name('posts.store');
