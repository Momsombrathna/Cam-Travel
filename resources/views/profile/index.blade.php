
@extends('layouts.app-master')
@section('content')
<br/><br/><br/>
<link rel="stylesheet" href="{{ asset('assets/css/tap.css') }}">

{{-- ======================================================================= --}}
{{-- Section Profile User --}}
{{-- ======================================================================= --}}
<section class="UserProfile">
    <div class="container py-5">

        <div class="row">
        <div class="col-lg-4">
            @auth
            <div class="card mb-4 text-center">
                <div class="card-body">
                    <img src="{{ $user->image }}" alt="avatar" class="image--cover">
                    <h3 class="my-3 textmode">{{auth()->user()->username}}</h3>
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



    {{-- ======================================================================= --}}
    {{-- TAP NAV --}}
    {{-- ======================================================================= --}}
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <div class="container w3-animate-opacity">
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'IDphoto')">Photo</button>
            <button class="tablinks" onclick="openCity(event, 'IDplace')">Place</button>
        </div>

        {{-- tap photo under profile --}}
        <div id="IDphoto" class="tabcontent">
        <table class="w3-animate-opacity">
            <section class="photo-place">
                @if ($posts->count() > 0)
                        <ul>
                            @foreach ($posts as $post)
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ $post->image }}" alt="Card image cap">
                                    <div class="card-body">
                                    <h5 hidden class="card-title">{{ $post->title }}</h5>
                                    <p hidden class="card-text">{{ $post->description }}</p>
                                    <p hidden class="card-text">{{ $post->location }}</p>
                                    <a  href="{{ route('uploadphoto.show', $post->id) }}" class="btn btn-primary">show</a>
                                    </div>

                                </div>
                            @endforeach
                        </ul>
                    @else
                        <p>No posts found.</p>
                    @endif
            </section>
        </table>
        </div>
        {{-- End tap photo under profile --}}

        {{-- tap place under profile --}}
        <div id="IDplace" class="tabcontent w3-animate-opacity">
        <table>
        <h1>place</h1>

        </table>
        </div>
        {{-- tap place under profile --}}

    </div>
    {{-- END TAP NAV --}}

@endsection

{{-- call tap from javascript in public  --}}
<script type="text/javascript" src="{{ asset('assets/js/tap.js') }}"></script>
