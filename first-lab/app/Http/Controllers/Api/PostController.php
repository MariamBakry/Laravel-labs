<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();

        return PostResource::collection($posts);

        // $response=[];
        // foreach($posts as $post){
        //     $response [] =[
        //         'id'=>$post->id,
        //         'title'=>$post->title,
        //         'user_id'=>$post->user_id
        //     ];
        // }

        // return $response;
    }

    public function show($id){
        $post = Post::find($id);

        return new PostResource($post);
        // return [
        //     'id'=>$post->id,
        //     'title'=>$post->title,
        //     'user_id'=>$post->user_id
        // ];
    }

    public function store(StorePostRequest $request){

        $title = $request->title;
        $description = $request->description;
        $postCreator = $request->post_creator;

        $post = Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator
        ]);

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $post['image']= $filename;
        }
        $post->save();
        return new PostResource($post);

        // return [
        //     'id'=>$post->id,
        //     'title'=>$post->title,
        //     'user_id'=>$post->user_id
        // ];
    }
}
