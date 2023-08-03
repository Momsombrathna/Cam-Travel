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
                            <img class="userImage" src="{{ $place->user->image }}" alt="avatar"/>
                        </a>
                    </div>
                    <div class="col">
                        <h5>{{ $place->user->username }}</h5>
                    </div>
                    @endauth
                  </div>
            </div>
            <div class="col hide-on-small">
                <div class="row" style="float:right">
                    <div class="col">
                        <a href="#">
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
                                    {!! $shareplacebtn !!}
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
            <div class="col hide-on-big fluild">
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
                                        <li><a class="dropdown-item" href="{{ route('uploadplace.create') }}" >Download</a></li>
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
                                </ul>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>

        </div>

        <div class="image-card text-center">
            <img style="width: 300px" src=" {{$place->image}} " alt=""/>
            <img style="width: 300px" src=" {{$place->images}} " alt=""/>
            <img style="width: 300px" src=" {{$place->imagess}} " alt=""/>
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

            <a class="textmode" href="{{ $place->location }}" target="blank">go to map</a>
        </div>

    </div>

</div>



@endsection


