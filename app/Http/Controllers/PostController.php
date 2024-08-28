<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Like;

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
        return view('posts.show')->with(['post' => $post]);
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
        // $post::where('user_id','Auth::id()');
        if(Auth::id()==$post['user_id']){
            $post->delete();
        }
        
        return redirect('/');
    }
    
    // only()の引数内のメソッドはログイン時のみ有効
      public function __construct()
      {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
      }
    
     /**
      * 引数のIDに紐づくリプライにLIKEする
      *
      * @param $id リプライID
      * @return \Illuminate\Http\RedirectResponse
      */
      public function like($id)
      {
        Like::create([
          'post_id' => $id,
          'user_id' => Auth::id(),
        ]);
    
        session()->flash('success', 'You Liked the Post.');
    
        return redirect()->back();
      }
    
      /**
       * 引数のIDに紐づくリプライにUNLIKEする
       *
       * @param $id リプライID
       * @return \Illuminate\Http\RedirectResponse
       */
      public function unlike($id)
      {
        $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
    
        session()->flash('success', 'You Unliked the Post.');
    
        return redirect()->back();
      }
      
    public function category(Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get()]);
    }
    
}
