<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app-master')
    @section('content')
    <br/><br/><br/>
    
    <div class="container fulid py-5">
        <!-- Gallery -->
        @foreach ($posts as $key => $post)
        <div class="row">
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
            <img
                src="{{ $post->image }}"
                class="w-100 shadow-1-strong rounded mb-4"
                alt="Boat on Calm Water"
            />
            <a class="btn btn-info btn-sm" href="{{ route('photo.show', $post->id) }}">Show</a>
            </div>   
        </div>
        @endforeach
        <!-- Gallery -->
    </div>
   

   {{-- @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
    @endguest --}}
</body>
</html>


