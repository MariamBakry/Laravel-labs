<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function show($id){
        $post = Post::find($id);
        $comments = Comment::where('post_id', '=', $id)->get();
        return view('post.show', ['post' => $post, 'comments' => $comments]);
    }
}
