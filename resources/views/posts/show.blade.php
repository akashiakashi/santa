<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
            Index
        </x-slot>
    <body>
        <h1>詳細画面</h1>
        <div>
            <p>タイトル：{{ $post->title }}</p>
            <p>本文：{{ $post->body }}</p>
            <p>カテゴリー：<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
        </div>
        <div>
            <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
            <a href="/">戻る</a>
        </div>
    </body>
    <p>{{$count_santa}}</p>
    <form action="/posts/{{$post->id}}/icon"method="post">
        @csrf
        <input value=1 type="hidden" name="reaction">
        <button type="submit">🎅</button>
    </form>
     <p>{{$count_good}}</p>
    <form action="/posts/{{$post->id}}/icon"method="post">
        @csrf
        <input value=2 type="hidden" name="reaction">
        <button type="submit">👍</button>
    </form>
    <p>{{$count_present}}</p>
    <form action="/posts/{{$post->id}}/icon"method="post">
        @csrf
        <input value=3 type="hidden" name="reaction">
        <button type="submit">🎁</button>
    </form>
    <p>{{$count_heart}}</p>
    <form action="/posts/{{$post->id}}/icon"method="post">
        @csrf
        <input value=4 type="hidden" name="reaction">
        <button type="submit">❤️</button>
    </form>
    <p>{{$count_snowman}}</p>
    <form action="/posts/{{$post->id}}/icon"method="post">
        @csrf
        <input value=5 type="hidden" name="reaction">
        <button type="submit">⛄️</button>
    </form>
    <form action="/posts/{{$post->id}}/comment" method="post">
        @csrf
        <textarea name="body"></textarea>
        <button type="submit">コメントする</button>
    </form>
    </x-app-layout>
</html>
