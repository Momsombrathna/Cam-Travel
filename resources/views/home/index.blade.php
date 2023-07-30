<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- This script got from frontendfreecode.com -->

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>
    <script src='http://frontendfreecode.com/codes/files/masonry.pkgd.min.js'></script>
    <script src='http://frontendfreecode.com/codes/files/imagesloaded.pkgd.min.js'></script>
</head>


    <body>
        @extends('layouts.partials.navbar')
        <div class="container-fluid">
            <div class= " card--thumnails " >
                <img class="thumnails"
                style="
                height: 650px;
                width: 100%;
                object-fit: cover;
                border-radius: 20px;
                "
                src="https://images.pexels.com/photos/4275885/pexels-photo-4275885.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="img-fluid" alt="Responsive image">
            <div>
        </div>
        <br>

        <h2>Post</h2>
        <div class="container-fluid mb-5">
            <div class="row gy-4 masonry">
                @foreach ($posts as $post)
                <!-- Use Bootstrap grid system to create responsive columns -->
                <div class="col-lg-3 col-md-4 col-6">
                    <!-- Use Bootstrap spacing utilities to control margins and paddings -->
                    <div class="image--hover m-0 p-1">
                        <a href="{{ route('photo.show', $post->id) }}">
                            <!-- Use Bootstrap responsive breakpoints to change image height -->
                            <img src="{{ $post->image }}"  class="img-fluid image h-25" style="width:100%; border-radius: 20px;">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <h2>Place</h2>
        <div class="container-fluid mb-5">
            <div class="row gy-4 masonry">
                @foreach ($places as $place)
                <!-- Use Bootstrap grid system to create responsive columns -->
                <div class="col-lg-3 col-md-4 col-6">
                    <!-- Use Bootstrap spacing utilities to control margins and paddings -->
                    <div class="image--hover m-0 p-1">
                        <a href="{{ route('place.show', $place->id) }}">
                            <!-- Use Bootstrap responsive breakpoints to change image height -->
                            <img src="{{ $place->image }}"  class="img-fluid image h-25" style="width:100%; border-radius: 20px;">
                            
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <script>
        window.onload = function () {
            var imgDefer = document.getElementsByTagName("img");
            for (var i = 0; i < imgDefer.length; i++) {
                if (imgDefer[i].getAttribute("data-src")) {
                    imgDefer[i].setAttribute("src", imgDefer[i].getAttribute("data-src"));
                }
            }
            var $container = $(".masonry");
            $container.imagesLoaded(function () {
                $container.masonry({
                    percentPosition: true
                });
            });
        };
        </script>
    </body>
</html>
