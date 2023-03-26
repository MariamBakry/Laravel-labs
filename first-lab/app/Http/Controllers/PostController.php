<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $allPosts = Post::all();
        return view('post.index', ['posts' => $allPosts]);
    }

    public function show($id){
        $post = Post::find($id);
        $users = User::all();
        $comments = Comment::where('post_id', '=', $id)->get();
        return view('post.show', ['post' => $post, 'users' => $users, 'comments' => $comments]);
    }

    public function destroy($id){
        Comment::where('post_id', '=', $id)->delete();
        Post::find($id) -> delete();
        return to_route('posts.index');
    }

    public function create(){
        $users = User::all();
        return view('post.create', ['users' => $users]);
    }

    public function store(Request $request){

        $title = $request->title;
        $description = $request->description;
        $postCreator = $request->post_creator;

        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator
        ]);
        return to_route('posts.index');
    }

    public function edit(){
        $users = User::all();
        return view('post.edit', ['users' => $users]);
    }

    public function update(Request $request){
        $id = preg_split("/\//",url()->previous());
        $post = Post::find($id[4]);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->post_creator;
        $post->save();
        return to_route('posts.index');
    }

    public function storeComment(Request $request){
        $description = $request->comment_description;
        $postCreator = $request->post_creator;
        $id = preg_split("/\//",url()->previous());
        $post_id = $id[4];

        Comment::create([
            'description' => $description,
            'user_id' => $postCreator,
            'post_id' => $post_id
        ]);

        return to_route('posts.index');
    }

}
