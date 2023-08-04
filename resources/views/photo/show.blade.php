@extends('layouts.app-master')
@section('content')
<br><br><br>
@if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
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
                        <a id="download-btn">
                            <img style="cursor: pointer" src="{{URL::asset('images/download.png')}}" height="auto" width="40pxpx">
                        </a>
                        <form action="{{ route('photo.save', $post->id) }}" method="post">
                            @csrf
                        
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                  </div>
            </div>
        </div>

        <div class="image-card text-center">
            <img class="img image_downlaod" src=" {{$post->image}} " alt=""/>
        </div>

    </div>

    <br>
    <div style="float: left">
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
<script>
    // Get the image element and the button element
    const img = document.querySelector('.image_downlaod');
    const btn = document.querySelector('#download-btn');

    // Add a click event listener to the button
    btn.addEventListener('click', async () => {
        try {
            // Fetch the image data as a blob
            const response = await fetch(img.src);
            const blob = await response.blob();

            // Create a URL for the blob
            const url = URL.createObjectURL(blob);

            // Create a link element with the URL and the filename
            const link = document.createElement('a');
            link.href = url;
            link.download = img.src.split('/').pop();

            // Append the link to the document body and click it
            document.body.appendChild(link);
            link.click();

            // Remove the link from the document body and revoke the URL
            document.body.removeChild(link);
            URL.revokeObjectURL(url);
        } catch (error) {
            // Handle any errors
            console.error(error);
        }
    });
</script>
 @endsection


