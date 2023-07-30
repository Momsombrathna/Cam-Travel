
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
    <title>edit place</title>
    <style>
      @media screen and (max-width: 720px) {
        .hide-on-small {
          display: none;
        }
      }
      @media screen and (min-width: 720px) {
        .hide-on-huge {
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
        <form method="POST" action="{{ route('places.update', $place->id) }}">
            @method('patch')
            @csrf
            <div class="row">
                <div class="col hide-on-small"> 
                  <div class="col"> 
                    <div class="row">
                      <div class="container">
                        <div class="drag-area">
                          <div class="icon">
                            <div id="image-container" class="p-3">    </div>
                          </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                      <div class="container">
                        <div class="drag-area">
                          <div class="icon">
                            <div id="image-containers" class="p-3">    </div>
                          </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                      <div class="container">
                        <div class="drag-area">
                          <div class="icon">
                            <div id="image-containerss" class="p-3">    </div>
                          </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col formtext">
                    <div class="form-group hide-on-huge">
                        <div class="container">
                          <div class="drag-area">
                            <div class="icon">
                              <div id="image-container" class="p-3"></div>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitle">Title</label>
                        <!-- Use value attribute to populate input field with current data -->
                        <!-- Use old() helper function to retain old input value if any -->
                        <input type="text" name="title" class="form-control mt-2" id="inputTitle" maxlength="70" placeholder="Title" value="{{ old('title', $place->title) }}">
                        @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                    </div>
                    <div class="form-group mt-4">
                        <label>Description</label>
                        <!-- Use value attribute to populate input field with current data -->
                        <!-- Use old() helper function to retain old input value if any -->
                        <textarea type="text" name="description" class="form-control mt-2"  maxlength="290" placeholder="Description">{{ old('description', $place->description) }}</textarea>
                        @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputLocation">Image Link</label>
                        <!-- Use value attribute to populate input field with current data -->
                        <!-- Use old() helper function to retain old input value if any -->
                        <textarea type="text" name="image" id="image-url" oninput="showImage(this.value)" class="form-control mt-2" placeholder="Image Link">{{ old('image', $place->image) }}</textarea>
                        @if ($errors->has('image'))
                        <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                    @endif
                    </div>
                    <div class="form-group mt-4">
                      <label for="inputLocation">Image Link</label>
                      <!-- Use value attribute to populate input field with current data -->
                      <!-- Use old() helper function to retain old input value if any -->
                      <textarea type="text" name="images" id="image-url" oninput="showImage(this.value)" class="form-control mt-2" placeholder="Image Link">{{ old('images', $place->images) }}</textarea>
                      @if ($errors->has('images'))
                      <span class="text-danger text-left">{{ $errors->first('images') }}</span>
                  @endif
                  </div>
                  <div class="form-group mt-4">
                    <label for="inputLocation">Image Link</label>
                    <!-- Use value attribute to populate input field with current data -->
                    <!-- Use old() helper function to retain old input value if any -->
                    <textarea type="text" name="imagess" id="image-url" oninput="showImagess(this.value)" class="form-control mt-2" placeholder="Image Link">{{ old('imagess', $place->imagess) }}</textarea>
                    @if ($errors->has('imagess'))
                    <span class="text-danger text-left">{{ $errors->first('imagess') }}</span>
                  @endif
                  </div>
                    <div class="form-group mt-4">
                        <label for="inputLocation">Loaction</label>
                        <!-- Use value attribute to populate input field with current data -->
                        <!-- Use old() helper function to retain old input value if any -->
                        <textarea type="text" name="location" class="form-control mt-2"  placeholder="Location">{{ old('location', $place->location) }}</textarea>
                        @if ($errors->has('location'))
                        <span class="text-danger text-left">{{ $errors->first('location') }}</span>
                        @endif
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-info mt-2">Update</button>
                    </div>
          
                </div>
              </div>
          </form>
          
    </div>

    </div>
</body>
@include('layouts.partials.showimage')

</html>


