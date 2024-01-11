<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Cloudinary;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
     public function index(Request $request, Post $post)
    {
        $keyword = $request->input('keyword');

        $query = Post::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orwhere('body', 'LIKE', "%{$keyword}%");
        }

        $posts = $query->get();

        return view('posts/index', compact('keyword', 'posts'));
    }

    public function show(Post $post, Reaction $reaction)
    {
        $count_santa=$reaction->where('genre',"1")->count();
        $count_good=$reaction->where('genre',"2")->count();
        $count_present=$reaction->where('genre',"3")->count();
        $count_heart=$reaction->where('genre',"4")->count();
        $count_snowman=$reaction->where('genre',"5")->count();
        
        return view('posts/show')->with(['post' => $post,'count_santa' =>$count_santa,'count_good' =>$count_good,'count_present' =>$count_present,'count_heart' =>$count_heart,'count_snowman' =>$count_snowman]);
    }

    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);
    }
    
    public function comment(Post $post, Request $request)
    {
        $postId = $post->id;
        
        $comment = new Comment([
                'user_id' => auth()->id(),
                'post_id' => $postId,
                'title' => $request->input('title'),
                'body' => $request->input('body'),
            ]);
            $comment->save();
            return redirect('/posts/'.$post->id);
    }

    public function store(Post $post, Request $request)
    {
        $input = $request['post'];
        $post->user_id = \Auth::id();
        if($request->file('image')){
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $post->image = $image_url;
        }
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    public function reaction(Request $request, Reaction $reaction, Post $post)
    {
        $reaction->user_id=\Auth::id();
        $reaction->post_id=$post->id;
        $reaction->genre=$request->reaction;
        $reaction->save();
        return redirect('/posts/' . $post->id);
    }

}
