@extends('layouts.app-master')

@section('content')
    <br><br><br>
    <p>{{ $post->title }}</p>

    <p>{{ $post->decription }}</p>

    <img src=" {{$post->image}} " alt="" style="width: 200px" style="height: 200px"/>

    <p>Location: {{ $post->location }}</p>

    <p>Posted by {{ $post->user->username }}</p>

@endsection
