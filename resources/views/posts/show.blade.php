@extends('layouts.app')

@section('title') Show @endsection

@section('content')
        <div class="card ">
            <div class="card-header">
              Post Info
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <h4>Title:{{$post->title}}</h4>
                <p>Description : {{$post->description}} </p>
              </blockquote>
            </div>
          </div>
          <div class="card mt-4 ">
            <div class="card-header">
              Post Creator Info
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <h4>Name: {{$post->user? $post->user->name :'not found'}}</h4>
                <p>Email: {{$post->user? $post->user->email :'not found'}}</p>
                <p>Created at : {{$post->user? $post->user->created_at->format('Y-m-d') :'not found'}}</p>
              </blockquote>
            </div>
          </div>
@endsection
