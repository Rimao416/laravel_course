<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFilterRequest;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
        $posts= Post::paginate(25);
        // return view('blog.index', compact('posts'));
        return view('blog.index',[ 'posts'=>$posts]);
    }
    public function show(string $slug, Post $post)
    {
        if ($post->slug != $slug) {
            // Si le slug ne correspond pas, redirige vers la bonne URL
            return redirect()->route('show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return view('blog.show', ['post' => $post]); 
    }
    public function create(){
        $post=new Post();
        
        return view('blog.create',[
            'post'=>$post
        ]);
    }
    public function store(CreatePostRequest $request){
        $post=Post::create($request->validated());
        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success',"L'article a bien été sauvegardé");
    }
    public function edit(Post $post){
        return view('blog.edit', ['post' => $post]);
    }
    public function update(Post $post, CreatePostRequest $request){
        $post->update($request->validated());
        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success',"L'article a bien été modifié");
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('blog.index')->with('success',"L'article a bien été supprimé");
    }
    public function filter(BlogFilterRequest $request){
        $posts=Post::query();
        if ($request->filled('title')) {
            $posts->where('title', 'like', '%' . $request->input('title') . '%');
        }
        if ($request->filled('content')) {
            $posts->where('content', 'like', '%' . $request->input('content') . '%');
        }
        $posts=$posts->paginate(25);
        return view('blog.index', ['posts' => $posts]);
    }

    
}
