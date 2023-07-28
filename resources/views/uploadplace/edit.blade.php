
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
        <form method="POST" action="{{ route('uploadlace.update', $post->id) }}">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col">
                    <div class="container">
                        <div class="drag-area">
                          <div class="icon">
                            <div id="image-container" class="p-3"></div>
                          </div>
                          
                        </div>
                    </div>
                </div>
                <div class="col formtext">
                    <div class="form-group">
                        <label for="inputTitle">Title</label>
                        <input type="text" name="title" class="form-control mt-2" id="inputTitle" value="{{ $post->title }}" placeholder="Title">
                        @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                    </div>
                    <div class="form-group mt-4">
                        <label>Description</label>
                        <textarea type="text" name="description" class="form-control mt-2"  placeholder="Description">{{ $post->title }}</textarea>
                        @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputLocation">Image Link</label>
                        <form action="">
                        <input type="text" name="image" id="image-url" onchange="showImage(this.value)" value="{{ $post->image }}" class="form-control mt-2" placeholder="Image Linnk">
                        </form>
                        @if ($errors->has('image'))
                        <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                    @endif
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputLocation">Image Link</label>
                        <form action="">
                        <input type="text" name="images" id="image-url" onchange="showImage(this.value)" value="{{ $post->images }}" class="form-control mt-2" placeholder="Image Linnk">
                        </form>
                        @if ($errors->has('images'))
                        <span class="text-danger text-left">{{ $errors->first('images') }}</span>
                    @endif
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputLocation">Image Link</label>
                        <form action="">
                        <input type="text" name="imagess" id="image-url" onchange="showImage(this.value)" value="{{ $post->imagess }}" class="form-control mt-2" placeholder="Image Linnk">
                        </form>
                        @if ($errors->has('imagess'))
                        <span class="text-danger text-left">{{ $errors->first('imagess') }}</span>
                    @endif
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputLocation">Loaction</label>
                        <textarea type="text" name="location" class="form-control mt-2"  placeholder="Location">value="{{ $post->location }}"</textarea>
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
<script>
    // This function takes an image URL as input and displays it in a div element
    function showImage(url) {
    // Create a new image element
    let image = document.createElement("img");
    // Set the source attribute to the URL
    image.src = url;
    // Set the width and height attributes to fit the div
    image.width = 300;
    image.height = 200;
    // Find the div element by its id
    let container = document.getElementById("image-container");
    // Append the image element to the div
    container.appendChild(image);
    }
  </script>
</html>

