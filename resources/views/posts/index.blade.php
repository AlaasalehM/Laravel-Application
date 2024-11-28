@extends('layouts.app')
@section('title') index @endsection

@section('content')

      <div class="text-center">
        <a href="{{route('posts.create')}}" class="btn btn-success" >Create Post</a>
      </div>
      <table class="table mt-4" >
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">postes By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td> {{$post->user? $post->user->name :'not found'}}</td>
                <td>{{$post->created_at->format('Y-m-d')}}</td>
                <td>
                  <a href="{{ route('posts.show',$post->id) }}" class="btn btn-info">View</a>
                  <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>

                  <form style="display: inline" method="POST" action="{{route('posts.destroy',$post->id)}}" onsubmit="return confirm('Are you sure you want to delete this ?');">
                    @csrf
                    @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button >
                  </form>

                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
@endsection
