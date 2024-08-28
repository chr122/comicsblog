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
            
            <form action="/posts" method="POST">
                <h1>漫画ブログ</h1>
                @csrf
                <div class="title">
                <h2>Title</h2>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                </div>
                <div class="body">
                    <h2>Comment</h2>
                    <textarea name="post[body]" placeholder="漫画の感想など">{{ old('post.body') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <input type="submit" value="create"/>
                
            </form>
            
            <div class="footer">
            <a href="/">戻る</a>
        </div>
            
        </x-app-layout>
        
    </body>
</html>