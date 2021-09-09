<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // \Illuminate\Support\Facades\DB::listen(function ($query) {
    //     logger($query->sql, $query->bindings);
    // });

    return view('posts', [
        'posts' => Post::latest('published_at')->with(['category', 'author'])->get()
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {
    // Find a post by its slug and pass it to a view called "post"
    return view('post', [
        'post' => $post
    ]);
}); // ->where('post', '[A-z_\-]+')

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts->load(['category', 'author'])
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts->load(['category', 'author'])
    ]);
});
