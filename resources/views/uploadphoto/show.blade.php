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
            <div class="col hide-on-small">
                <div class="row" style="float:right">
                    <div class="col">
                        <a href="#">
                            <img style="cursor: pointer" src="{{URL::asset('images/download.png')}}" height="auto" width="40px">
                        </a>
                    </div>

                    <div class="col">
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
                                    {!! $shareBtn !!}
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
                                        <li><a class="dropdown-item" href="{{ route('uploadphoto.create') }}" >Download</a></li>
                                    </button>
                                    @can('update', $post)
                                    <button class="btn text-left">
                                        <li><a class="dropdown-item" href="{{ route('uploadphoto.edit', $post->id) }}" >Edit</a></li>
                                    </button>
                                    @endcan
                                    @can('update', $post)
                                    <form action="{{ route('uploadphoto.destroy', $post->id) }}" method="POST">
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

                                                {!! $shareBtn !!}

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

                                </ul>
                            </div>
                        @endauth
                    </div>
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
        <p>Description: {{ $post->description }}</p>
        <p>Created at: {{ $post->created_at }}</p>
        <p>updated at: {{ $post->updated_at }}</p>
        <div>
            <img src="{{URL::asset('images/location.png')}}" alt="logo" height="auto" width="20px">

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


