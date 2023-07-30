@extends('layouts.app-master')
@section('content')
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
                    {{-- <div class="col">
                        <form action="{{ route('uploadphoto.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div> --}}
                  </div>
            </div>
        </div>

        <div class="image-card text-center">
            <img class="img" src=" {{$post->image}} " alt=""/>
        </div>

    </div>

    <br>
    <div style="float: left">
        <h4>Title: {{ $post->title }}</h4>
        <p>{{ $post->description }}</p>
        <p style="font-size: 10px">Created at: {{ $post->created_at }}</p>
        <p style="font-size: 10px">Updated at: {{ $post->updated_at }}</p>
        <div>
            <img src="{{URL::asset('images/location.png')}}" height="auto" width="20px">
            <a class="textmode" href="{{ $post->location }}" target="blank">go to visit</a>
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


