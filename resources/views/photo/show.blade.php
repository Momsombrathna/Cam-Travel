@extends('layouts.app-master')
@section('content')
{{-- @import('share'); --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.0/css/all.css">

<br><br><br>
<div class="container textmode card py-2 mb-3">
    <img style="cursor: pointer" onclick="history.back()" src="{{URL::asset('images/back.png')}}" alt="logo" height="auto" width="40px">
</div>

<div class="card-show-photo mb-5" style="padding: 30px">
    <div class="text-center" >

        <div class="row" >
            <div class="col">
                <div class="row" style="float:left; text-align:center; justify-content:center; align-items: center;">
                    @auth
                    <div class="col" style="float: left; cursor:pointer" >
                        <a href="{{ route('profile.show', $user->id) }}">
                            <img class="userImage" src="{{ $post->user->image }}" alt="avatar"/>
                        </a>
                    </div>
                    <div class="col">
                        <h5>{{ $post->user->username }}</h5>
                    </div>
                    @endauth
                  </div>
            </div>
            <div class="col">
                <div class="row" style="float:right">
                    <div class="col">
                        <a href="#">
                            <img style="cursor: pointer" src="{{URL::asset('images/download.png')}}" height="auto" width="40pxpx">
                        </a>
                    </div>
                    <div class="col">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Share
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Share this with your Community</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body social-btn-sp" >
                                    {{-- social media --}}
                                        {!! $shareButtons !!}
                                    {{-- end social media --}}
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                </div>
                            </div>
                            </div>
                        </div>
                        {{-- end modal --}}
                    </div>
                  </div>
            </div>
        </div>

        <div class="image-card text-center">
            <img class="img" src=" {{$post->image}} " alt=""/>
        </div>

    </div><br>


    <div class="row" style="float:left">
        <h4>Title: {{ $post->title }}</h4>
        <p>Description: {{ $post->description }}</p>
        <p>Created at: {{ $post->created_at }}</p>
        <p>Updated at: {{ $post->updated_at }}</p>
        <div>
            <img src="{{URL::asset('images/location.png')}}" height="auto" width="20px">
            <a class="textmode" href="{{ $post->location }}" target="blank">go to map</a>
        </div>
    </div>

</div>


<style>

    @media (max-width: 768px) {
        .img {
            max-width: 50%;
        }
    }

    @media (max-width: 480px) {
        .img {
            max-width: 300px;
        }
    }
</style>
 @endsection


