@extends('layouts.app')

@section('content')
        <div class="card" style="margin-top:10px; padding: 30px;">
        <div class="card-header">
            Post info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post['title']}}</h5>
            <p class="card-text">Description: {{$post['description']}}</p>
            <p class="card-text">Created at: {{$post['created_at']}}</p>
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
            <p class="card-text">Email: {{$post['posted_by']}}123@gmail.com</p>
        </div>
        
        </div>
        <a type="button" class="btn btn-outline-primary" href="{{route('posts.index')}}" style="margin: 30px;">Back to all posts</a>
@endsection