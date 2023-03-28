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
        @csrf
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
                                <x-button class="btn btn-outline-primary"><a style="text-decoration: none;" href="{{route('posts.show', $post->id)}}">View</a></x-button>
                                <x-button class="btn btn-outline-primary"><a style="text-decoration: none;"  href="{{route('posts.edit', $post->id)}}">Edit</a></x-button>
                                <button type='submit' data_id="{{$post->id}}" class="btn btn-outline-primary deletePost" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                                
                            </div>
                        </td>
                    </tr>
                </tbody>
        @endforeach
        </table>
        {{$posts->links('pagination::bootstrap-4')}}

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
    
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete?
            </div>
            <div class="modal-footer">
                <form action="" method="POST">
                @csrf
                @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
                
            </div>
            </div>
        </div>
        </div>


        <script>
            let deleteBtns = document.querySelectorAll('.deletePost');
            deleteBtns.forEach(button=>{
                button.addEventListener('click' , (event)=>{
                    let postId = Number(event.target.getAttribute('data_id'));
                    let modalForm = document.querySelector('.modal-footer form');
                
                    modalForm.setAttribute('action' , `/posts/${postId}`);
                })
            })
            
        </script>
@endsection

