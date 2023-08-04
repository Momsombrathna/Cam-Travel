@extends('layouts.app-master')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.0/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <br><br><br>
    
{{-- back class --}}
<div class="container textmode card py-2 mb-3">
    <img style="cursor: pointer" onclick="history.back()" src="{{URL::asset('images/back.png')}}" alt="logo" height="auto" width="40px">
</div>
{{-- end back class --}}


{{-- main class --}}

<div class="card ">
    <div class="card-header ">
        <div class="row textmode" >
            <div class="col">
                <div class="row " style="float:left">
                    @auth
                        <div class="col" style="float: left; cursor:pointer" >
                            <a href="{{ route('profile.show', $user->id) }}">
                                <img class="userImage" src="{{$post->user->image }}" alt="avatar"/>
                            </a>
                        </div>
                        <div class="col textmode">
                            <h5  style="justify-content:center">{{ $post->user->username }}</h5>
                        </div>
                    @endauth
                </div>
            </div>

            {{-- col for desktop --}}
            <div class="col hide-on-small">
                <div class="row" style="float:right">
                    
                    <script>
                       function myFunction(x) {
                            x.classList.toggle("fas fa-2x fa-bookmark");
                        }
                    </script>
                    

                    <div class="col">
                        <a id="download-btn" href="#">
                            {{-- <i class="fas fa-circle-arrow-down  fa-2x" ></i> --}}
                            <img style="cursor: pointer" src="{{URL::asset('images/download.png')}}" height="auto" width="40px">
                        </a>
                    </div>
                    
                    <div class="col">
                        <form action="{{ route('photo.save', $post->id) }}" method="post">
                            @csrf
                        
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                    {{-- <div class="col">
                        @can('update', $post)
                        <a href="{{ route('uploadphoto.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                        @endcan
                    </div>
                    <div class="col">
                        @can('update', $post)
                        <form action="{{ route('uploadphoto.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endcan
                    </div> --}}
                    <div class="col">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Share
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal PopUp for share image to social media -->
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

            {{-- col for tablet and mobile phone --}}
            <div class="col  hide-on-big fluild">
                <div class="row" style="float:right">
                    <div class="col">
                        @auth
                            <div style="margin-left: 10px;" class="dropdown">
                                <button src="https://images.pexels.com/photos/15767257/pexels-photo-15767257.jpeg?cs=srgb&dl=pexels-thamyres-silva-15767257.jpg&fm=jpg&_gl=1*gt2tmu*_ga*MTMxMjgzNTE2NC4xNjg5Mzg4NjIx*_ga_8JE65Q40S6*MTY4OTg0NTYzNS41LjEuMTY4OTg0Njk2NS4wLjAuMA.."
                                class=" btn btn-premiry dropdown-toggle" type="profile" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
                                    More
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <button id="download-btn" class=" btn text-left">
                                        <li><a class="dropdown-item" >Download</a></li>
                                    </button>
                                    <form action="{{ route('photo.save', $post->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn"><li><a class="dropdown-item" >save</a></li></button>
                                    </form>
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <li><a class="dropdown-item" >Share</a></li>
                                    </button>
                                </ul>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
            {{-- end col for tablet and mobile phone--}}
        </div>
    </div>
    <div class="card-body">
        <div class="card-containers">
            <img class="card-img-top image-card image " style="align-content: center; align-item:center" src=" {{$post->image}} "  alt="Card image cap">
        </div>
        <hr class="textmode">

        <h3 class="card-title textmode" >Title: {{ $post->title }}</h3>
        <p class="card-title textmode mb-5" >Description: {{ $post->description }}</p>
        <div>
            <i  href="{{ $post->location }}" class="fas textmode fa-location-dot"></i>
            <a class="textmode" href="{{ $post->location }}" target="blank">go to map</a>
        </div>


        <hr class="textmode">

        <p class="card-text textmode p-c" >Created at: {{ $post->created_at }} <br> Updated at: {{ $post->updated_at }}</p>
    </div>
</div>
@include('layouts.partials.imagedownload')
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





