<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <x-slot name="header">
    <head>
        <meta charset="utf-8">
         <title>Blog</title>
         {{ Auth::user()->name }}

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:200,600" rel="stylesheet">

    </head>
    </x-slot>
    <body class='antialiased'>
        <h1>Blog Name </h1>
        <a href="/posts/create">create</a>
        <div class='posts'>
            @foreach($posts as $post)
            <div class='post'>
                <h2 class='title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
            <p class='body'>{{ $post->body}}</p>
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
            </form>
        </div>
        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
            @endforeach
        </div>
        <div class='paginate'>{{ $posts->links() }}</div>
        <script>
            function deletePost(id) {
                'use strict'

                 if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                     document.getElementById(`form_${id}`).submit();
                 }
             }
        </script>
    </body>
    </x-app-layout>
</html>
