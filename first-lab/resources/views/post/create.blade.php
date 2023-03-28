@extends('layouts.app')

@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif

<form style="padding: 30px;" action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" required>
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
    <textarea class="form-control" name="description" placeholder="Leave a comment here" id="description" style="height: 100px" required></textarea>
    <label for="floatingTextarea2">Description</label>
  </div>

  <div class="mb-3">
    <label for="exampleInputImage" class="form-label fs-4">Insert Image </label>
    <i class="text-secondary"> (Optional)</i>
    <input type="file" name="image" accept=".jpg,.png" class="form-control" id="exampleInputImage">
  </div>

  <button type="submit" class="btn btn-primary" style="margin-top:10px;">Submit</button>
</form>
@endsection