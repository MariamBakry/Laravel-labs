@extends('layouts.app')

@section('content')
        <div class="card" style="margin-top:10px; padding: 30px;">
        <div class="card-header">
            Post info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post->title}}</h5>
            <p class="card-text">Description: {{$post->description}}</p>
            <p class="card-text">Created at: {{$post->created_at}}</p>
        </div>
        </div>

        <div class="card" style="margin-top:10px; padding: 30px;">
        <div class="card-header">
            Post creator info
        </div>
        <div class="card-body">
            @if($post->user)
                <h5 class="card-title">Name: {{$post->user->name}}</h5>
            @else
                <h5 class="card-title">Name: Not found</h5>
            @endif
            <p class="card-text">Email: {{$post->user->email}}</p>
        </div>
        
        </div>
        <a type="button" class="btn btn-outline-primary" href="{{route('posts.index')}}" style="margin: 30px;">Back to all posts</a>



        <!--comments form-->
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                    <div class="card-body p-4">
                        <form class="form-outline mb-4" action="{{route('posts.storeComment', $post->id)}}" method="post">
                        @csrf
                            <div class="form-outline mb-4">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Post creator</label>
                                    <select  name='post_creator' class="form-select" aria-label="Default select example">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <input type="text" id="addANote" class="form-control" placeholder="Type comment..." name="comment_description" required/>
                                
                                <button type="submit" class="btn btn-outline-primary" >Add comment</button>
                            </div>
                        </form>

                        <!--comments-->
                        @foreach($comments as $comment)
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <p name='comment_description'>{{$comment->description}}</p>

                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" width="25" height="25" />
                                        <p class="small mb-0 ms-2">{{$comment->user->name}}</p>
                                    </div>

                                    

                                    <div class="d-flex flex-row align-items-center">
                                        <p class="small text-muted mb-0">{{$comment->created_at}}</p>
                                        <i class="far fa-thumbs-up ms-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                                    </div>

                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <x-button class="btn btn-outline-primary"><a style="text-decoration: none;"  href="{{route('posts.editComment', $comment->id)}}">Edit</a></x-button>
                                        <form action="{{ route('posts.destroyComment', $comment->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type='submit' data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-primary" >Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection