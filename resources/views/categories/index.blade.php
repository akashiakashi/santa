    <x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
        <h1>カテゴリー:{{ $category_name }} のとうこう</h1>
        <div>
            @foreach ($posts as $post)
                <div style='border:solid 1px; margin-bottom: 10px;'>
                    <table>
                        <tr>
                            <th width="300" align="center">タイトル</th>
                            <th width="300" align="left"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></th>
                        </tr>
                        <tr>
                            <td width="300" align="center">カテゴリー</td>
                            <td width="300" align="left">{{ $post->category->name }}</td>
                        </tr>
                    </table>
                </div>
            @endforeach
        </div>
        <div>
            {{ $posts->links() }}
        </div>
        </div>
        </div>
</x-app-layout>