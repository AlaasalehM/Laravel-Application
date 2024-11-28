
@extends('layouts.app')
@section('title') Create @endsection
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

<form method="post" action="{{route('posts.store')}}">
    @csrf
    <div class="mb-3">
        <label  class="form-label">Title</label>
        <input name="title" class="form-control" id="exampleFormControlInput1" value="{{old('title')}}">
      </div>
      <div class="mb-3">
        <label  class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3" >{{old('description')}}</textarea>
      </div>
      <label  class="form-label">post creator</label>
      <select name="post_creator" class="form-select" aria-label="Default select example">
        @foreach($users as $users)
                <option value="{{$users->id}}">{{$users->name}}</option>
        @endforeach
      </select>
      <button  class="btn btn-success mt-4">submit</button>
</form>
@endsection
