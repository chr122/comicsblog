<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        dd('hello');
        $input = $request->all();
        dd($input);
        Auth::user()->like($postId);
        return 'ok!'; //レスポンス内容
    }

    public function destroy($postId)
    {
        Auth::user()->unlike($postId);
        return 'ok!'; //レスポンス内容
    }
}
