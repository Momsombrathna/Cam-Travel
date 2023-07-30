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
                Location: {{ $post->location }}
            </div>
            <td>Post by: {{ $post->user->username }}</td>
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('posts.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection
