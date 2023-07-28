@extends('layouts.app-master')

@section('content')
    <br><br><br>
    <p>{{ $post->title }}</p>

    <p>{{ $post->description }}</p>

    <img src=" {{$post->image}} " alt="" style="width: 50px" style="height: 50px"/>

    <p>Location: {{ $post->location }}</p>

    <p>Posted by {{ $post->user->username }}</p>

@endsection
