@extends('layouts.app')

@section('content')
<form style="padding: 30px;">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="email" class="form-control" id="title" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Post creator</label>
    <input type="email" class="form-control" id="creator" aria-describedby="emailHelp">
  </div>
  <div class="form-floating">
    <textarea class="form-control" placeholder="Leave a comment here" id="description" style="height: 100px"></textarea>
    <label for="floatingTextarea2">Description</label>
  </div>
  <a type="submit" class="btn btn-primary" href= "{{route('posts.store')}}" style="margin-top:10px;">Submit</a>
</form>
@endsection