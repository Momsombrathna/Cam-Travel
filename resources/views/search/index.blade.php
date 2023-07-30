@extends('layouts.app-master')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Search Results</div>
        <div class="card-body">
          @if(count($posts) > 0)
          <ul class="list-group">
            @foreach($posts as $post)
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <a href="{{ route('profile.showitem', $post->id) }}">{{ $post->title }}</a>
              <a href="{{ route('profile.showitem', $post->id) }}">{{ $post->description }}</a>
              <span class="badge badge-primary">{{ $post->created_at->diffForHumans() }}</span>
            </li>
            @endforeach
          </ul>
          @else
          <p>No results found for post</p>
          @endif
        </div>
        <div class="card-body">
            @if(count($users) > 0)
            <ul class="list-group">
              @foreach($users as $user)
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="col">
                    <a class="row" href="{{ route('profile.show', $user->id) }}">{{ $user->username }}</a>
                    <a class="row" href="{{ route('profile.show', $user->id) }}">{{ $user->name }}</a>
                </div>
                <span class="badge badge-primary">{{ $user->created_at->diffForHumans() }}</span>
              </li>
              @endforeach
            </ul>
            @else
            <p>No results found for users</p>
            @endif
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
