@extends('layouts.app')
@section('title') edit @endsection
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{route('posts.update',$post->id)}}">
    @csrf
    @method('put')
      <div class="mb-3">
        <label  class="form-label">Title</label>
        <input name="title" class="form-control" value= "{{$post->title}}" id="exampleFormControlInput1" >
      </div>
      <div class="mb-3">
        <label  class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3">{{$post->description}}</textarea>
      </div>
      <label  class="form-label">post creator</label>
      <select name="post_creator" class="form-select" aria-label="Default select example">
        @foreach($users as $user)
         <option value="{{$user->id}}" {{ $user->id == $post->user_id ? 'selected' : '' }}>{{$user->name}}</option>
        @endforeach
      </select>
      <button  class="btn btn-primary mt-4">Update</button>
</form>
@endsection
