<!--<!DOCTYPE html>-->
<!--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">-->
<!--    <head>-->
<!--        <meta charset="utf-8">-->
<!--        <title>漫画ブログ</title>-->

        <!-- Fonts -->
<!--        <link rel="preconnect" href="https://fonts.bunny.net">-->
<!--        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />-->
        
<!--    </head>-->
<!--    <body class="antialiased">-->
        
        <x-app-layout>
            <x-slot name="header">
               <h3 class="font-semibold text-xl text-gray-800 leading-tight"> 漫画ブログ </h3>
            </x-slot>
            
            <div>
              <form action="{{ route('post.search') }}" method="GET">
            
              @csrf
            
                <input type="text" name="keyword" placeholder="キーワードを入力">
                <input type="submit" value="検索">
              </form>
            </div>
            
            <!--<h1 class="font-bold text-2xl">漫画ブログ</h1>-->
            <div class='posts'>
                <div class='post'>
                    @foreach ($posts as $post)
                        <div class="m-5">
                            <p class='text-xl font-extrabold leading-normal'>{{$post->user->name}}</p>
                            <a href="/posts/{{ $post->id }}" class="text-lg font-medium">
                                 <h2>{{ $post->title }}</h2>
                            </a>
                            <p class='body'>{{ $post->body }}</p>
                            
                        
                            <a href="/categories/{{ $post->category->id }}" class='leading-10'>{{ $post->category->name }}</a>
                            
                            @if($post->user_id==Auth::id())
                                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="deletePost({{ $post->id }})" class='text-red-500'>delete</button> 
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class=''>
                    {{--{{ $posts->links('pagination::bootstrap-5') }}--}}
                    {{ $posts->links() }}
                </div>
            </div>
            
            <script>
                function deletePost(id) {
                    'use strict'
            
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
            
            <div class='flex justify-center  [&_ul]:flex'>
                <div class='text-center space-x-4 flex justify-between'>
                    {{ $posts->links() }}
                </div>
            </div>
            
        </x-app-layout>
        
<!--    </body>-->
<!--</html>-->