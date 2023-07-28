@extends('layouts.app-master')
<h1>Search Results</h1>
<br><br><br>
<ul>
    @foreach ($users as $user)
            <a href="{{ route('profile.show', $user->id) }}">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $user->image }}" class="card-img-top rounded-circle" alt="...">
                    <div class="card-body">
                    <h5 class="card-title textmode" style="text-decoration: none">Username: {{ $user->username }}</h5>
                    <p class="card-text textmode" style="text-decoration: none">Role: {{ $user->name }}</p>
                    </div> 
                </div>
            </a>
    @endforeach

    @foreach ($posts as $post)
     
        <a href="{{ route('profile.showitem', $post->id) }}">
            <div class="card" style="width: 18rem;">
                <img src="{{ $post->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title textmode" style="text-decoration: none">title: {{ $post->title }}</h5>
                    <p class="card-text textmode" style="text-decoration: none">{{ $post->description }}</p>
                </div>
            </div>
        </a>
    @endforeach
</ul>