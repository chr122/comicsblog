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
            
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <div class='comments'>
                    <div class='comment'>
                        
                        <div class="body">
                            <h2>Comment</h2>
                            <textarea name="comment[body]" placeholder="返信">{{ old('comment.body') }}</textarea>
                            <p class="body__error" style="color:red">{{ $errors->first('comment.body') }}</p>
                        </div>
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="submit" value="comment">
                    </div>
                </div>
            </form>
            
            
            
            <div class="footer">
                <a href="/">戻る</a>
            </div>
            
        </x-app-layout>
        
    </body>
</html>