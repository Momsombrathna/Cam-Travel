@extends('layouts.app-master')

@section('content')
    <br/><br/><br/>
    <div class="bg-light p-4 rounded">
        <h2>Update post</h2>
        <div class="lead">
            Edit post.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('posts.update', $post->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input value="{{ $post->title }}" 
                        type="text" 
                        class="form-control" 
                        name="title" 
                        placeholder="Title" required>

                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea 
                        type="text" 
                        class="form-control" 
                        name="description" 
                        placeholder="Description" required>{{ $post->description }}</textarea>

                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">image</label>
                    <textarea
                        type="text" 
                        class="form-control" 
                        name="image" 
                        placeholder="Image Link" required>{{ $post->image }}</textarea>

                    @if ($errors->has('image'))
                        <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <textarea 
                        type="text" 
                        class="form-control" 
                        name="location" 
                        placeholder="Location Link" required>{{ $post->location }}</textarea>

                    @if ($errors->has('location'))
                        <span class="text-danger text-left">{{ $errors->first('location') }}</span>
                    @endif
                </div>


                <button type="submit" class="btn btn-primary">Save changes</button>
                <a href="{{ route('posts.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection