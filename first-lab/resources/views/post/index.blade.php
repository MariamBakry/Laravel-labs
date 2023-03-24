@extends('layouts.app')

@section('content')
    <div class="table-responsive" style="padding: 30px;">
        <a type="button" class="btn btn-outline-primary" style="text-align: center;" href="{{route('posts.create')}}">Create</a>
        <table class="table" style="text-align: center;">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col"></th>
            </tr>

        @foreach($posts as $post)
                <tbody>
                    <tr>
                        <th scope="row" class="table-active">{{$post->id}}</th>
                        <td class="table-active">{{$post->title}}</td>
                        @if($post->user)
                            <td class="table-active">{{$post->user->name}}</td>
                        @else
                            <td class="table-active">Not found</td>
                        @endif
                        <td class="table-active">{{$post->created_at}}</td>
                        <td class="table-active">
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <x-button class="btn btn-outline-primary"><a style="text-decoration: none;" href="{{route('posts.show', $post['id'])}}">View</a></x-button>
                                <x-button class="btn btn-outline-primary"><a style="text-decoration: none;"  href="{{route('posts.edit', $post['id'])}}">Edit</a></x-button>
                                <x-button class="btn btn-outline-primary">Delete</x-button>
                            </div>
                        </td>
                    </tr>
                </tbody>
        @endforeach
        </table>
@endsection