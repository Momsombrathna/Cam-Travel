


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

    @extends('layouts.app-master')

    <div class="card container ">
        <form method="POST" id="uploadImage" autocomplete="off">
            <div class="row">
                <div class="col">
                    <div class="container textmode">
                        <div class="drag-area">
                          <div class="icon">
                            <i class="fas fa-images"></i>
                          </div>
                          <span class="header">Drag & Drop</span>
                          <span id="image" name="image" class="header">or <span class="button">browse</span></span>
                          <input type="file" id="image" name="image" hidden />
                          <span class="support">Supports: JPEG, JPG, PNG</span>
                        </div>
                    </div>
                </div>
                <div class="col formtext textmode">
                    <div class="form-group">
                        <label for="inputTitle">Title</label>
                        <input type="text" class="form-control mt-2" id="title" name="title" placeholder="Title">
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputDescription">Description</label>
                        <input type="text" class="form-control mt-2" id="decription" name="decription" placeholder="Description">
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputLocation">Loaction</label>
                        <input type="text" class="form-control mt-2" id="location" name="location" placeholder="Location">
                    </div>
                    <div class="form-group mt-4">
                        <button type="button" id="submitUpload" class="btn btn-info mt-2">Submit</button>
                    </div>

                </div>
              </div>
        </form>
    </div>


</body>
</html>



// {{--  javascript for drag and drop image --}}
<script>
    const dropArea = document.querySelector('.drag-area');
    const dragText = document.querySelector('.header');

    let button = dropArea.querySelector('.button');
    let input = dropArea.querySelector('input');

    let file;

    button.onclick = () => {
    input.click();
    };
    // when browse
    input.addEventListener('change', function () {
    file = this.files[0];
    dropArea.classList.add('active');
    displayFile();
    });

    // when file is inside drag area
    dropArea.addEventListener('dragover', (event) => {
    event.preventDefault();
    dropArea.classList.add('active');
    dragText.textContent = 'Release to Upload';
    // console.log('File is inside the drag area');
    });

    // when file leave the drag area
    dropArea.addEventListener('dragleave', () => {
    dropArea.classList.remove('active');
    // console.log('File left the drag area');
    dragText.textContent = 'Drag & Drop';
    });

    // when file is dropped
    dropArea.addEventListener('drop', (event) => {
    event.preventDefault();
    // console.log('File is dropped in drag area');

    file = event.dataTransfer.files[0]; // grab single file even of user selects multiple files
    // console.log(file);
    displayFile();
    });

    function displayFile() {
    let fileType = file.type;
    // console.log(fileType);

    let validExtensions = ['image/jpeg', 'image/jpg', 'image/png'];

    if (validExtensions.includes(fileType)) {
    // console.log('This is an image file');
    let fileReader = new FileReader();

    fileReader.onload = () => {
    let fileURL = fileReader.result;
    // console.log(fileURL);
    let imgTag = `<img src="${fileURL}" alt="">`;
    dropArea.innerHTML = imgTag;
    };
    fileReader.readAsDataURL(file);
    } else {
    alert('This is not an Image File');
    dropArea.classList.remove('active');
    }
    }
</script>


