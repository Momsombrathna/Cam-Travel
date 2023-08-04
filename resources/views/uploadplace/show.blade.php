@extends('layouts.app-master')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.0/css/all.css">
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
                            <a href="{{ route('profile.index', $user->id) }}">
                                <img class="userImage" src="{{$place->user->image }}" alt="avatar"/>
                            </a>
                        </div>
                        <div class="col textmode">
                            <h5  style="justify-content:center">{{ $place->user->username }}</h5>
                        </div>
                    @endauth
                </div>
            </div>


            {{-- col for desktop --}}
            <div class="col hide-on-small">
                <div class="row" style="float:right">
                    <div class="col">
                        <a href="#">
                            {{-- <i class="fas fa-circle-arrow-down  fa-2x" ></i> --}}
                            <img style="cursor: pointer" src="{{URL::asset('images/download.png')}}" height="auto" width="40px">
                        </a>
                    </div>
                    <div class="col">
                        @can('update', $place)
                        <a href="{{ route('uploadplace.edit', $place->id) }}" class="btn btn-primary">Edit</a>
                        @endcan
                    </div>
                    <div class="col">
                        @can('update', $place)
                        <form action="{{ route('uploadplace.destroy', $place) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endcan
                    </div>
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
                                    <button class=" btn text-left">
                                        <li><a class="dropdown-item" href="{{ route('uploadphoto.create') }}" >Download</a></li>
                                    </button>
                                    @can('update', $place)
                                    <button class="btn text-left">
                                        <li><a class="dropdown-item" href="{{ route('uploadplace.edit', $place->id) }}" >Edit</a></li>
                                    </button>
                                    @endcan
                                    @can('update', $place)
                                    <form action="{{ route('uploadplace.destroy', $place->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class=" btn  text-left">
                                        <li><a class="dropdown-item" type="submit" >Delete</a></li>
                                        </button>
                                    </form>
                                    @endcan
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
            {{-- carousel image --}}
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="card-img-top image-card d-block  w-100 " style="align-content: center; align-item:center" src=" {{$place->image}} "  alt="Card image cap">
                  </div>
                  <div class="carousel-item">
                    <img class="card-img-top image-card d-block  w-100 " style="align-content: center; align-item:center" src=" {{$place->images}} "  alt="Card image cap">
                  </div>
                  <div class="carousel-item">
                    <img class="card-img-top image-card d-block  w-100 " style="align-content: center; align-item:center" src=" {{$place->imagess}} "  alt="Card image cap">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            {{-- end carousel image  --}}
        </div>
        <hr class="textmode">

        <h3 class="card-title textmode" >{{ $place->title }}</h3>
        <p class="card-title textmode mb-5" >{{ $place->description }}</p>
        <div>
            <i  href="{{ $place->location }}" class="fas textmode fa-location-dot"></i>
            <a class="textmode" href="{{ $place->location }}" target="blank">go to map</a>
        </div>


        <hr class="textmode">

        <p class="card-text textmode p-c" >Created at: {{ $place->created_at }} <br> Updated at: {{ $place->updated_at }}</p>
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





