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
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit(3)]);
    }
    
    public function show(Post $post)
    {
        
        // 投稿に関連するコメントをロード 
        $post->load('comments');
        $user = Auth::user();
        $isLike = $user->isLike($post->id);
        
        return view('posts.show')->with(['post' => $post, 'isLike'=>$isLike]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }

    public function store(Post $post, PostRequest $request)
    {
        $input = $request['post'];
        $id = Auth::id();
        $post->user_id = $id;
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
}
