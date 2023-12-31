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
                        <a href="{{ route('profile.index', $user->id) }}">
                            <img class="userImage" src="{{$place->user->image }}" alt="avatar"/>
                        </a>
                    </div>
                    <div class="col">
                        <h5>{{ $place->user->username }}</h5>
                    </div>
                    @endauth
                  </div>
            </div>
            <div class="col">
                <div class="row" style="float:right">
                    <div class="col">
                        <a href="#">
                            <img style="cursor: pointer" src="{{URL::asset('images/download.png')}}" height="auto" width="40px">
                        </a>
                    </div>

                  </div>
            </div>
        </div>

        <div class="image-card text-center">
            <img style="width: 300px"  src=" {{$place->image}} " alt=""/>
            <img style="width: 300px"  src=" {{$place->images}} " alt=""/>
            <img style="width: 300px"  src=" {{$place->imagess}} " alt=""/>
        </div>

    </div>
    
    <br><br><br>
    <div style="float: left">
        <h4>Title: {{ $place->title }}</h4>
        <p>{{ $place->description }}</p>
        <p style="font-size: 10px">Created at: {{ $place->created_at }}</p>
        <p style="font-size: 10px">Updated at: {{ $place->updated_at }}</p>
        <div>
            <img src="{{URL::asset('images/location.png')}}" alt="logo" height="auto" width="20px">

            <a class="textmode" href="{{ $place->location }}" target="blank">{{ $place->location }}</a>
        </div>

    </div>

</div>

@endsection


