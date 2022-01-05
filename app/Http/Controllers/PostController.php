<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('posts.posts',['posts'=>$posts]);
    }

    public function create(){
        return view('posts.create');
    }
    public function store(Request $request){
        $posts = new Post;
        $posts->title = $request->title;
        $posts->description = $request->description;
        $posts->save();
        return redirect('/posts');
    }

    public function edit($id){
        $post = Post::find($id);
        return view('posts.edit',['post'=>$post]);
    }

    public function update(Request $request,$id){
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect('/posts');
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts');
    }

    public function show($id){
        return 0;
    }
}
