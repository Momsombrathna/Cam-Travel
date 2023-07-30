
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
    <title>admin upload photo</title>
    <style>
      @media screen and (max-width: 720px) {
        .hide-on-small {
          display: none;
        }
      }
  </style>

</head>
<body>
    <div style="margin-top: 90px;" >
    <div class="container textmode card py-2 mb-3">
        <img style="cursor: pointer; " onclick="history.back()" src="{{URL::asset('images/back.png')}}" alt="logo" height="auto" width="40px">
    </div>



    <div class="card container ">
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="row">
                <div class="col hide-on-small">
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
                        <input type="text" name="title" class="form-control mt-2" id="inputTitle" maxlength="70" placeholder="Title">
                        @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                    </div>
                    <div class="form-group mt-4">
                        <label>Description</label>
                        <textarea type="text" name="description" class="form-control mt-2"  maxlength="290" placeholder="Description"></textarea>
                        @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputLocation">Image Link</label>
                        <textarea type="text" name="image" id="image-url" oninput="showImage(this.value)" class="form-control mt-2" placeholder="Image Link"></textarea>
                        @if ($errors->has('image'))
                        <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                    @endif
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputLocation">Loaction</label>
                        <textarea type="text" name="location" class="form-control mt-2"  placeholder="Location"></textarea>
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

    </div>
</body>
@include('layouts.partials.showimage')
</html>


