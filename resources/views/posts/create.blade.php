<x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
        <h1 class="text-orange-600 bg-white-100">サンタクロースにメッセージをおくろう🎅</h1>
        <h2>サンタさんにききたいことやつたえたいことを　じゆうにかいてみよう！</h2>
        <!-- formタグにenctypeを追加 -->
        <br>
        <br>
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <h2>タイトル</h2>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                </div>
                <br>
                <div>
                    <h2>ないよう</h2>
                    <textarea name="post[body]" placeholder="サンタさんはどこに住んでいますか？">{{ old('post.body') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <!-- ここから追加 -->
                <br>
                <h2>しゃしん</h2>
                <div class="image">
                    <input type="file" name="image">
                </div>
                <!-- ここまで追加 -->
                <br>
                <div>
                    <h2>カテゴリー</h2>
                    <select name="post[category_id]">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" class="text-white-700 bg-orange-300" value="ほぞん"/>
            </form>
        </div>
        </div>
        <div><a href="/">もどる</a></div>
</x-app-layout>