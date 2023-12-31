@extends('layouts.app-master')

@section('content')
    <br/><br/><br/>
    <div class="bg-light p-4 rounded">
        <h2>Show post</h2>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <img src="{{ $post->image }}" alt="" style="width: 400px" style="height: 400px">
            <div class="mt-3">
                Title: {{ $post->title }}
            </div>
            <div>
                Description: {{ $post->description }}
            </div>
            <div>
                Location: <a href="{{ $post->location }}" class="textmode" target="_blank" rel="noopener noreferrer">visit</a>
            </div>
            <div>Post by: {{ $post->user->username }}</div>
            <div>Created at: {{ $post->created_at }}</div>
            <div>Updated at: {{ $post->updated_at }}</div>
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('posts.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection
