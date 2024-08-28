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
            
            <!--<h1 class="font-bold text-2xl">漫画ブログ</h1>-->
            <div class='posts'>
                <div class='post'>
                    <h2 class='text-xl font-bold'>{{ $category->name }}</h2>
                    @foreach ($posts as $post)
                        <div class="m-5">
                            <a href="/posts/{{ $post->id }}">
                                 <h2 class="text-lg font-semibold">{{ $post->title }}</h2>
                            </a>
                            <p class='body'>{{ $post->body }}</p>
                        </div>
                    @endforeach
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
            
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
            
        </x-app-layout>
        
    </body>
</html>