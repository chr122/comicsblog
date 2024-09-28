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
            
            <form action="/posts" method="POST" enctype="multipart/form-data">
                <!--<h1>漫画ブログ</h1>-->
                @csrf
                <div class='pl-5 pt-5 font-medium'>
                <h2>Title</h2>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                </div>
                <div class='pl-5 pt-5 font-medium'>
                    <h2>Comment</h2>
                    <textarea name="post[body]" placeholder="漫画の感想など">{{ old('post.body') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <div class='pl-5 pt-5 font-medium'>
                    <h2>Image</h2>
                    <input type="file" name="image">
                </div>
                <div class='pl-5 pt-5 font-medium'>
                    <h2>Category</h2>
                    <select name="post[category_id]">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="create"/ class='text-sky-500 pl-5 pt-5 font-medium'>
                
            </form>
            
            <div class='pl-5 pt-5 pb-5 font-medium'>
            <a href="/">← Homeに戻る</a>
        </div>
            
        </x-app-layout>
        
    </body>
</html>