
@extends('layouts.app-master')
@section('content')
<br/><br/><br/>

{{-- Section Profile User --}}
<section class="UserProfile">
    <div class="container py-5">

        <div class="row">
        <div class="col-lg-4">
            @auth
            <div class="card mb-4 text-center">
            <div class="card-body">
                <img src="{{ $user->image }}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3 textmode">{{auth()->user()->username}}</h5>
            </div>
            <div>
                <a class="w-100 btn btn-lg btn-primary" href="{{ route('profile.edit') }}"type="submit">Change Profile</a>
            </div>
            </div>
            @endauth
        </div>
        <div class="col-lg-8 textmode">
            <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Role</p>
                </div>
                <div class="col-sm-9 ">
                    <p class="text-muted mb-0">{{auth()->user()->name}}</p>
                </div>
                </div>
                <hr>
                <div class="row ">
                <div class="col-sm-3 ">
                    <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9 ">
                    <p class="text-muted mb-0">{{auth()->user()->email}}</p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3 ">
                    <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">+855 {{ $user->phone }}</p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3 ">
                    <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $user->address }}</p>
                </div>
                </div>
            </div>
            </div>

        </div>
    </div>
    </section>
    {{-- End Section Profile User --}}

    {{-- tap photo and place under profile --}}
    <section class="photo-place">
        @if ($posts->count() > 0)
                <ul>
                    @foreach ($posts as $post)
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ $post->image }}" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">{{ $post->title }}</h5>
                              <p class="card-text">{{ $post->description }}</p>
                              <p class="card-text">{{ $post->location }}</p>
                              <a href="{{ route('uploadphoto.show', $post->id) }}" class="btn btn-primary">edit</a>
                            </div>
                            
                        </div>
                    @endforeach
                </ul>
            @else
                <p>No posts found.</p>
            @endif
    </section>
    {{-- End tap photo and place under profile --}}
@endsection
