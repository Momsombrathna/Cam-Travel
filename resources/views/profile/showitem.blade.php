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
                            <img class="userImage" src="{{$post->user->image }}" alt="avatar"/>
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
                            <img style="cursor: pointer" src="{{URL::asset('images/download.png')}}" height="auto" width="40px">
                        </a>
                    </div>

                  </div>
            </div>
        </div>

        <div class="image-card text-center">
            <img  src=" {{$post->image}} " alt=""/>
        </div>

    </div>
    
    <br>
    <div style="float: left">
        <h4>Title: {{ $post->title }}</h4>
        <p>Description: {{ $post->description }}</p>
        <p>Created at: {{ $post->created_at }}</p>
        <div>
            <img src="{{URL::asset('images/location.png')}}" alt="logo" height="auto" width="20px">

            <a class="textmode" href="{{ $post->location }}" target="blank">{{ $post->location }}</a>
        </div>

    </div>

</div>

<script>
    // Define a function to download an image from a link
    function downloadImage(link) {
    // Create a new image element
    var image = new Image();
    // Set the source attribute to the link
    image.src = link;
    // Wait for the image to load
    image.onload = function() {
        // Create a new anchor element
        var link = document.createElement("a");
        // Set the href attribute to the image data URL
        link.href = image.src;
        // Set the download attribute to the image file name
        link.download = image.src.split("/").pop();
        // Append the link to the document body
        document.body.appendChild(link);
        // Click the link to download the image
        link.click();
        // Remove the link from the document body
        document.body.removeChild(link);
    };
    }
</script>



@endsection


