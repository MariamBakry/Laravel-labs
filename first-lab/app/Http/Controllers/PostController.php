<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::get();
        return view('post.index', compact('posts'));
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

    public function destroyComment($comment_id){
        $comment = Comment::find($comment_id);
        $post_id = $comment->post_id;
        $comment->delete();
        return to_route('posts.show', $post_id);
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

    public function edit($id){
        $post = Post::find($id);
        $users = User::all();
        return view('post.edit', ['users' => $users, 'post' => $post]);
    }

    public function editComment($comment_id){
        $comment = Comment::find($comment_id);
        $users = User::all();
        return view('post.editComment', ['users' => $users, 'comment' => $comment]);
    }

    public function update(Request $request, $id){
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->post_creator;
        $post->save();
        return to_route('posts.show', $id);
    }

    public function updateComment(Request $request, $comment_id){
        $comment = Comment::find($comment_id);
        $post_id = $comment->post_id;
        $comment->description = $request->description;
        $comment->user_id = $request->post_creator;
        $comment->save();
        return to_route('posts.show', $post_id);
    }

    public function storeComment(Request $request, $id){
        $description = $request->comment_description;
        $postCreator = $request->post_creator;

        Comment::create([
            'description' => $description,
            'user_id' => $postCreator,
            'post_id' => $id
        ]);

        return to_route('posts.show', $id);
    }


}
