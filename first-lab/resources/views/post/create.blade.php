@extends('layouts.app')

@section('content')
<form style="padding: 30px;" action="{{route('posts.store')}}" method="post">
@csrf
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Post creator</label>
    <select  name='post_creator' class="form-select" aria-label="Default select example">
      @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-floating">
    <textarea class="form-control" name="description" placeholder="Leave a comment here" id="description" style="height: 100px"></textarea>
    <label for="floatingTextarea2">Description</label>
  </div>
  <button type="submit" class="btn btn-primary" style="margin-top:10px;">Submit</button>
</form>
@endsection