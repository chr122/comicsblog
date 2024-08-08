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
            
            <div class="footer">
            <a href="/">戻る</a>
        </div>
            
        </x-app-layout>
        
    </body>
</html>