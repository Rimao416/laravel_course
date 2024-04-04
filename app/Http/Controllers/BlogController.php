<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(): Paginator
    {
        return Post::paginate(25);
    }
    public function show(string $slug, string $id)
    {
        $post = Post::findOrFail($id);
        if ($post->slug == $slug) {
            return to_route('blog.show', ['slug' => $slug, 'id' => $id]);
        }
        return $post;
    }
}
