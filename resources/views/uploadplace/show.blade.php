@extends('layouts.app-master')

@section('content')
    <br><br><br>
    <p>{{ $post->title }}</p>

    <p>{{ $post->decription }}</p>

    <img src=" {{$post->image}} " alt="" style="width: 50px" style="height: 50px"/>
    <img src=" {{$post->images}} " alt="" style="width: 50px" style="height: 50px"/>
    <img src=" {{$post->imagess}} " alt="" style="width: 50px" style="height: 50px"/>

    <p>Location: {{ $post->location }}</p>

    <p>Posted by {{ $post->user ? $post->user->name : 'Anonymous' }}</p>
    <a href="{{ route('uploadphoto.edit', $post->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('uploadphoto.destroy', $post) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Post</button>
    </form>

@endsection
