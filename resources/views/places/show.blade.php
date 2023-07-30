@extends('layouts.app-master')

@section('content')
    <br/><br/><br/>
    <div class="bg-light p-4 rounded">
        <h2>Show place</h2>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <div class="image-card text-center">
                <img style="width: 300px" src=" {{$place->image}} " alt=""/>
                <img style="width: 300px" src=" {{$place->images}} " alt=""/>
                <img style="width: 300px" src=" {{$place->imagess}} " alt=""/>
            </div>
            <div class="mt-3">
                Title: {{ $place->title }}
            </div>
            <div>
                Description: {{ $place->description }}
            </div>
            <div>
                Location: <a href="{{ $place->location }}" class="textmode" target="_blank" rel="noopener noreferrer">visit</a>
            </div>
            <div>place by: {{ $place->user->username }}</div>
            <div>Created at: {{ $place->created_at }}</div>
            <div>Updated at: {{ $place->updated_at }}</div>
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('places.edit', $place->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('places.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection
