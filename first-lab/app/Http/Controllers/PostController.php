<?php

namespace App\Http\Controllers;

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
        return view('post.show', ['post' => $post]);
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
        $allPosts = [];
        return view('post.edit');
    }

    public function update(){
        return to_route('posts.index');
    }

}
