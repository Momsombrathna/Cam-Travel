@extends('layouts.app-master')

@section('content')
    <br><br><br>
    <h1>Profile</h1>

    @if ($posts->count() > 0)
        <ul>
            @foreach ($posts as $post)
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $post->image }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <p class="card-text">{{ $post->description }}</p>
                      <p class="card-text">{{ $post->location }}</p>
                      <a href="{{ route('uploadphoto.show', $post->id) }}" class="btn btn-primary">show</a>
                    </div>
                  </div>
            @endforeach
        </ul>
    @else
        <p>No posts found.</p>
    @endif
@endsection
