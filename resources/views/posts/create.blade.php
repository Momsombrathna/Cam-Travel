@extends('layouts.app-master')

@section('content')
    <br/><br/><br/>
    <h1 class="mb-3">Post Contents</h1>
    {{-- <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">Users</a>
    <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm">User Roles</a> --}}


    <div class="bg-light p-4 rounded mt-3">
        <h2>Posts</h2>
        <div class="lead">
            Manage your posts here.
            {{-- <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-right">Add post</a> --}}
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
          <tr>
             <th width="1%">No</th>
             <th>post by</th>
             <th>title</th>
             <th>description</th>
             <th>location</th>
             <th>image</th>
             <th>post by user</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($posts as $key => $post)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $post->user->username }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>{{ $post->location }}</td>
                <td><img src="{{ $post->image }}" alt="" style="width: 50px" style="height: 50px"></td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('posts.show', $post->id) }}">Show</a>
                </td>
                {{-- <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                </td> --}}
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $posts->links() !!}
        </div>

    </div>
@endsection
