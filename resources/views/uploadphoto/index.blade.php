
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
        <form method="POST" action="{{ route('posts.store') }}">
            <div class="row">
                <div class="col">
                    <div class="container">
                        <div class="drag-area">
                          <div class="icon">
                            <i class="fas fa-images"></i>
                          </div>
            
                        </div>
                    </div>
                    <img id="image" style="width: 100px" style="height: 100px" />
                </div>
                <div class="col formtext">
                    <div class="form-group">
                        <label for="inputTitle">Title</label>
                        <input type="text" name="title"  class="form-control mt-2" id="title" placeholder="title">
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputDescription">Description</label>
                        <textarea type="text" name="description" class="form-control mt-2" id="decription" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputLocation">Image</label>
                        <input type="text" name="image" class="form-control mt-2" id="imageUrl" placeholder="image Link">
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputLocation">Loaction</label>
                        <input type="text" name="location" class="form-control mt-2" id="location" placeholder="Location">
                    </div>
                    <div class="form-group mt-4">
                        <button type="button" type="submit" class="btn btn-info mt-2">Submit</button>
                    </div>

                </div>
              </div>
        </form>
    </div>


</body>
</html>


{{--  javascript for drag and drop image --}}
<script>
    function showImage() {
    // Get the image URL from the user input.
    const imageUrl = document.getElementById("imageUrl").value;

    // Create an HTML element for the image.
    const imageElement = document.createElement("img");
    imageElement.src = imageUrl;

    // Append the image to the DOM.
    document.getElementById("image").appendChild(imageElement);
    }

    // Show the image when the page loads.
    window.onload = showImage;
</script>
