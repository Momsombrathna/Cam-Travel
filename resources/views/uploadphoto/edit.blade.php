
@extends('layouts.app-master')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/upload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/draganddrop.css') }}">
    <title>Upload photo</title>

</head>
<body>

    {{-- @section('content') --}}

    <div class="card container ">
        <form method="POST" action="{{ route('uploadphoto.update', $post->id) }}">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col">
                    <div class="container">
                        <div class="drag-area">
                          <div class="icon">
                            <i class="fas fa-images"></i>
                          </div>
                          <span class="header">Drag & Drop</span>
                          <span class="header">or <span class="button">browse</span></span>
                          <input type="file" hidden />
                          <span class="support">Supports: JPEG, JPG, PNG</span>
                        </div>
                    </div>
                </div>
                <div class="col formtext">
                    <div class="form-group">
                        <label for="inputTitle">Title</label>
                        <input type="text" name="title" class="form-control mt-2" id="inputTitle" placeholder="Title" value="{{ $post->title}}">
                        @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                    </div>
                    <div class="form-group mt-4">
                        <label>Description</label>
                        <textarea type="text" name="description" class="form-control mt-2"  placeholder="Description">{{ $post->description}}</textarea>
                        @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputLocation">Image Link</label>
                        <textarea type="text" name="image" class="form-control mt-2" placeholder="Image Linnk">{{ $post->image}}</textarea>
                        @if ($errors->has('image'))
                        <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                    @endif
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputLocation">Loaction</label>
                        <textarea type="text" name="location" class="form-control mt-2"  placeholder="Location">{{ $post->location}}</textarea>
                        @if ($errors->has('location'))
                        <span class="text-danger text-left">{{ $errors->first('location') }}</span>
                        @endif
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-info mt-2">Submit</button>
                    </div>

                </div>
              </div>
        </form>
    </div>


</body>
</html>


