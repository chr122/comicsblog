<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit(10)]);
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function store(Post $post, PostRequest $request)
    {
        $input = $request['post'];
        $id = Auth::id();
        $post->user_id = $id;
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
}
