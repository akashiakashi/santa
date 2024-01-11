    <x-app-layout>
        
        <h1 class="text-orange-600 bg-white-100">サンタクロースとおはなししよう！！</h1>
        <div>
            <form action="{{ route('index') }}" method="GET">
                <input type="text" name="keyword" value="{{ $keyword }}">
                <input type="submit" value="検索">
            </form>
        </div>
        
        <h2>✨みんなのとうこう✨</h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <p class="text-lg ">みんなの<b>【しつもん】</b>や【つたえたいこと】をサンタさんにおくると、おへんじがもらえるよ❕</p>
            <div class="mt-2 mb-2">
                <a href='/posts/create' class="shadow-lg bg-orange-500 shadow-orange-500/50 text-white rounded px-2 py-1">とうこうする</a>
            </div>
            <br>
            <div>
                @foreach ($posts as $post)
                    <div style='border:solid 1px; margin-bottom: 10px;' >
                        <br>
                        <table>
                            <tr>
                                <th width="300" align="center">タイトル</th>
                                <th width="300" align="left"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></th>
                            </tr>
                            <tr>
                                <td width="300" align="center">おなまえ</td>
                                <td width="300" align="left">{{ $post->user->name }}</td>
                            </tr>
                            <tr>
                                <td width="300" align="center">カテゴリー</td>
                                <td width="300" align="left">{{ $post->category->name }}</td>
                            </tr>
                        </table>
                                <img src="{{$post->image}}">
                                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="deletePost({{ $post->id }})" class=" text-white-700 bg-orange-300 " >けす</button>
                                </form>
                    </div>
                @endforeach
            </div>
        </div>
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
