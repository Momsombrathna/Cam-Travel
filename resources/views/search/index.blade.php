@extends('layouts.app-master')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/upload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/draganddrop.css') }}">
    <title>Upload photo</title>
    <style>
      @media screen and (max-width: 720px) {
        .hide-on-small {
          display: none;
        }
      };
  </style>

</head>

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Search Results</div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <h3>Users</h3>
              @if(count($users) > 0)
                @foreach($users as $user)
                <li style="border: 0;" class="list-group-item d-flex justify-content-between">
                  <div class="row">
                    <img src="{{$user->image}}" alt="" style="width: 70px" style="height: 70px"  class="rounded-circle">
                    <div class="col">
                      <a class="row textmode" href="{{ route('profile.show', $user->id) }}">{{ $user->username }}</a>
                      <a class="row textmode" href="{{ route('profile.show', $user->id) }}">{{ $user->name }}</a>
                    </div>
                  </div>
                  <span class="badge badge-primary">{{ $user->created_at->diffForHumans() }}</span>
                </li>
                @endforeach
                @else
                <p>No users found.</p>
              @endif 
            </div>
            <div class="col-md-4">
              <h3>Posts</h3>
              @if(count($posts) > 0)
                @foreach($posts as $post)
                <li style="border: 0;" class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="row">
                    <div class="col">
                      <img src="{{ $post->image }}" alt="" style="width:70px" >
                    </div>
                    <div class="col">
                      <a class="row textmode" href="{{ route('profile.showitem', $post->id) }}">{{ $post->title }}</a>
                      <a class="row textmode" href="{{ route('profile.showitem', $post->id) }}">{{ $post->description }}</a>
                    </div>
                  </div>
                  <span class="badge badge-primary">{{ $post->created_at->diffForHumans() }}</span>
                </li>
                @endforeach
              @else
                <p>No posts found.</p>
              @endif 
            </div>
            <div class="col-md-4">
              <h3>Places</h3>
              @if(count($places) > 0)
                @foreach($places as $place)
                <li style="border: 0;" class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="row">
                    <div class="col">
                      <img src="{{ $place->image }}" alt="" style="width:70px" >
                    </div>
                    <div class="col">
                      <a class="row textmode" href="{{ route('profile.showitemplace', $place->id) }}">{{ $place->title }}</a>
                      <a class="row textmode" href="{{ route('profile.showitemplace', $place->id) }}">{{ $place->description }}</a>
                    </div>
                  </div>
                  <span class="badge badge-primary">{{ $place->created_at->diffForHumans() }}</span>
                </li>
                @endforeach
              @else
                <p>No places found.</p>
              @endif  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
