    <x-app-layout>
        <x-slot name="header">
            いちらん
        </x-slot>

        <h1 class="text-orange-600 bg-white-100">サンタクロースとおはなししよう！！</h1>
        <div>
            <form action="{{ route('posts.index') }}" method="GET">
                <input type="text" name="keyword" value="{{ $keyword }}">
                <input type="submit" value="検索">
            </form>
        </div>
        
        <h2>✨みんなのとうこう✨</h2>
        <p class="text-lg ">みんなの【ききたいこと】や【つたえたいこと】をサンタさんにおくると、おへんじがもらえるよ❕</p>
        <div class="mt-2 mb-2">
            <a href='/posts/create' class="shadow-lg bg-orange-500 shadow-orange-500/50 text-white rounded px-2 py-1">とうこうする</a>
        </div>
        <br>
        <div>
            @foreach ($posts as $post)
                <div style='border:solid 1px; margin-bottom: 10px;' >
                    <br>
                    <p>
                        タイトル：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </p>
                    <p>おなまえ：{{ $post->user->name }}</p>
                    <p>カテゴリー：{{ $post->category->name }}</p>
                    <img src="{{$post->image}}">
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})" class=" text-white-700 bg-orange-300 " >けす</button>
                    </form>
                    <br>
                </div>
            @endforeach
        </div>
        <div>
            {{ $posts->links() }}
        </div>
        <script>
            function deletePost(id){
                'use strict'
                
                if(confirm('けすと　もどせないよ！\nほんとうに　けしていいの？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </x-app-layout>
