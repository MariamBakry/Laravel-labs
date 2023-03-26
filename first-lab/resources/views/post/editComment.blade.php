@extends('layouts.app')

@section('content')
<form style="padding: 30px;" action="{{route('posts.updateComment',$comment->id)}}" method="post">
@csrf
@method("put")
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Post creator</label>
    <select name='post_creator' class="form-select" aria-label="Default select example">
      @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-floating">
    <textarea name="description" class="form-control" placeholder="Leave a comment here" id="description" style="height: 100px"  required></textarea>
    <label for="floatingTextarea2">Description</label>
  </div>
  <button type="submit" class="btn btn-primary" style="margin-top:10px;">Edit</button>
</form>
@endsection