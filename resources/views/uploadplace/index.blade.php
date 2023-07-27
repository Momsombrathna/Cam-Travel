<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/upload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/multiupload.css') }}">
    <title>Document</title>
</head>

<body>
    @extends('layouts.app-master')


    <div class="card container ">
        <form>
            <div class="row">
                <div class="col">
                    <form action="" method="" enctype="multipart/form-data" id="my-form"></form>
                    <div class="multiple-uploader" id="multiple-uploader">
                        <div class="mup-msg">
                            <span class="mup-main-msg">click to upload images.</span>
                            <span class="mup-msg" id="max-upload-number">Upload up to 10 images</span>
                            <span class="mup-msg">Only images, pdf and psd files are allowed for upload</span>
                        </div>
                    </div>
                </div>

                <div class="col formtext">
                    <div class="form-group">
                        <label for="inputTitle">Title</label>
                        <input type="text" class="form-control mt-2" id="inputTitle" placeholder="Title">
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputDescription">Description</label>
                        <input type="text" class="form-control mt-2" id="inputDecription" placeholder="Description">
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputLocation">Loaction</label>
                        <input type="file" class="form-control mt-2" id="inputLocation" placeholder="Location">
                    </div>
                    <div class="form-group mt-4">
                        <button type="button" class="btn btn-info mt-2">Submit</button>
                    </div>

                </div>
            </div>
        </form>
    </div>


    <script>
        let multipleUploader = new MultipleUploader('#multiple-uploader').init({
            maxUpload: 20, // maximum number of uploaded images
            maxSize: 2, // in size in mb
            filesInpName: 'images', // input name sent to backend
            formSelector: '#my-form', // form selector
        });
    </script>


</body>

</html>
