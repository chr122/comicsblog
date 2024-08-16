<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>漫画ブログ</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
    </head>
    <body class="antialiased">
        
        <x-app-layout>
            <x-slot name="header">
               <h3 class="font-semibold text-xl text-gray-800 leading-tight"> 漫画ブログ </h3>
            </x-slot>
            
            <div class='posts'>
                <div class='post'>
                    <div class="m-5">
                        <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                        <p class='body'>{{ $post->body }}</p>
                    </div>
                </div>
            </div>
            
            
            @if($isLike)
                <div>
                  <button onclick="like({{$post->id}})">いいね解除</button>
                </div>
            @else
                <form action="/like" method="POST">
                   @csrf
                    <div>
                        <input type="hidden" name="postId" value="{{$post->id}}" />
                        
                    </div>
                        <input type="submit" value="いいね" />
                </form>
            @endif
            
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <div class='comments'>
                    <div class='comment'>
                        
                        <div class="body">
                            <h2>Comment</h2>
                            <textarea name="comment">{{ old('comment') }}</textarea>
                            <p class="body__error" style="color:red">{{ $errors->first('comment.body') }}</p>
                        </div>
                        <div class="review"> 
                            <label for="review">Review</label> 
                            <input type="number" name="review" min="1" max="5" value="{{ old('review') }}" />
                            @error('review') 
                                <p class="review_error" style="color:red">{{ $message }}</p>
                            @enderror 
                        </div>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        <input type="submit" value="comment" />
                    </div>
                </div>
            </form>
            
            <div>
                <h2>コメント一覧</h2>
                @if($post->comments->isEmpty())
                    <p>No comments yet.</p>
                @else
                    <ul>
                        @foreach($post->comments as $comment)
                            <li>
                                <strong>{{ $comment->user->name }}:</strong> <!-- ユーザー名 -->
                                <!-- 星評価の表示 --> 
                                <p> 
                                    @for ($i = 0; $i < $comment->review; $i++) 
                                        ★ 
                                    @endfor 
                                    @for ($i = $comment->review; $i < 5; $i++) 
                                        ☆ 
                                    @endfor 
                                </p>
                                <p>{{ $comment->comment }}</p> <!-- コメント内容 -->
                                <small>Posted on {{ $comment->created_at->format('Y-m-d H:i') }}</small> <!-- 投稿日時 -->
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            
            <div class="edit">
                <a href="/posts/{{$post->id}}/edit">edit</a>
            </div>
            
            <div class="footer">
                <a href="/">戻る</a>
            </div>
            
        </x-app-layout>
        
    </body>
</html>