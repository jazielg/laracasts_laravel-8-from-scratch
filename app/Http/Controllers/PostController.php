<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        // Gate::allows('admin'); // return boolean
        // request()->user()->can('admin'); // return boolean
        // $this->authorize('admin'); // return 403 if not authorize

        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        // Find a post by its slug and pass it to a view called "post"
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
