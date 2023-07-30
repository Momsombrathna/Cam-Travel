@extends('layouts.app-master')

@section('content')
    <br/><br/><br/>
    <h1 class="mb-3">Admin Post Contents</h1>
    {{-- <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">Users</a>
    <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm">User Roles</a> --}}


    <div class="bg-light p-4 rounded mt-3">
        <h2>Posts</h2>
        <div class="lead ">
            Manage your posts here.
            <form class="d-flex col-3 mt-2" action="{{ route('search.post') }}" method="GET">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm col float-right mb-2 ">Add post</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
          <tr>
             <th width="1%">No</th>
             <th>Post by</th>
             <th>Title</th>
             <th>Description</th>
             <th>Location</th>
             <th>Image</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($posts as $key => $post)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td><p>{{ $post->user->username }}</p></td>
                <td><p>{{ $post->title }}</p></td>
                <td><p>{{ $post->description }}</p></td>
                <td><a href="{{ $post->location }}" class="textmode" target="_blank" rel="noopener noreferrer">visit</a></td>
                <td><img src="{{ $post->image }}" alt="" style="width: 50px" style="height: 50px"></td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('posts.show', $post->id) }}">Show</a>
                </td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('posts.edit', $post->id) }}">edit</a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>

    </div>
@endsection
