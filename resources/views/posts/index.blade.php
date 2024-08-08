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
                    @foreach ($posts as $post)
                    <div class="m-5">
                        <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                        <p class='body'>{{ $post->body }}</p>
                    </div>
                @endforeach
                </div>
            </div>
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
            
        </x-app-layout>
        
    </body>
</html>