@extends('layouts.app-master')

@section('content')
    <br/><br/><br/>
    <div class="bg-light p-4 rounded">
        <h2>Show post</h2>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <div>
                Title: {{ $post->title }}
            </div>
            <img src="{{ $post->image }}" alt="" style="width: 50px" style="height: 50px">
            <div>
                Description: {{ $post->description }}
            </div>
            <div>
                Location: {{ $post->location }}
            </div>
            <div>
                Posted by {{ $post->user->username }}
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('posts.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection