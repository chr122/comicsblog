<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
//     public function store(Request $request)
//   {
//       $id = Auth::id();
//       $comment->user_id = Auth::user()->id;
//       $comment->post_id = $request->post_id;
//       $comment = new Comment();
//       $comment = review;
//       $comment->save();

//       return redirect('/');
//   }

    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'comment' => 'required|max:500',
            'review' => 'required|integer',
        ]);
    
        // コメントを保存
        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $request->input('post_id'), // どの投稿に対するコメントかを保存
            'review' => $validated['review'],
            'comment' => $validated['comment'],
        ]);
    
        return redirect()->back()->with('message', 'コメントを投稿しました！');
    }
    
    public function destroy(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        return redirect('/');
    }
}
