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

                <div class="col formtext textmode">
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

<script>
    class MultipleUploader {

        #multipleUploader;
        #$imagesUploadInput;

        constructor(multiUploaderSelector) {
            this.#multipleUploader = document.querySelector(multiUploaderSelector);
            this.#$imagesUploadInput = document.createElement('input')
        }

        init({
            maxUpload = 10,
            maxSize = 2,
            formSelector = 'form',
            filesInpName = 'images'
        } = {}) {

            const form = document.querySelector(formSelector);

            if (!this.#multipleUploader) // check if the end user didnt write the multiple uploader div
                throw new Error('The multiple uploader element doesnt exist');

            if (!form) // check if there is no form with this selector
                throw new Error('We couldn\'t find a form with this selector: ' + formSelector);

            // ensure that the form has enctype attribute with the value multipart/form-data
            form.enctype = 'multipart/form-data'

            if (document.getElementById('max-upload-number'))
                document.getElementById('max-upload-number').innerHTML = `Upload up to ${ maxUpload } files`;

            // create multiple file input and make it hidden
            this.#$imagesUploadInput.type = 'file';
            this.#$imagesUploadInput.name = `${filesInpName}[]`;
            this.#$imagesUploadInput.multiple = true;
            this.#$imagesUploadInput.accept = "image/*";
            this.#$imagesUploadInput.style.setProperty('display', 'none', 'important');
            // create multiple file input and make it hidden

            // append the newly created input to the form with the help of the formSelector provided by the user
            document.querySelector(formSelector).append(this.#$imagesUploadInput);

            this.#multipleUploader.addEventListener("click", (e) => {

                if (e.target.className === 'multiple-uploader' || e.target.className === 'mup-msg' || e
                    .target.className === 'mup-main-msg')
                    this.#$imagesUploadInput.click() // trigger the input file to upload images

            });

            const self = this;

            // preview the uploaded images
            this.#$imagesUploadInput.addEventListener("change", function() {

                if (this.files.length > 0) {
                    self.#multipleUploader.querySelectorAll('.image-container').forEach(image => image
                        .remove()); // clear the previous rendered images
                    self.#multipleUploader.querySelector('.mup-msg').style.setProperty('display',
                    'none'); // hide the hint texts inside drop zone

                    // if the length of uploaded images greater than the images uploaded by the user, the maximum uploaded will be considered
                    const uploadedImagesCount = this.files.length > maxUpload ? maxUpload : this.files
                        .length;
                    const unAcceptableImagesIndices = [];

                    for (let index = 0; index < uploadedImagesCount; index++) {

                        const imageSize = self.#bytesToSize(this.files[index].size);
                        const isImageSizeAcceptable = self.#checkImageSize(index, imageSize, maxSize, 'MB');


                        // appended the newly created image to the multiple uploader
                        self.#multipleUploader.innerHTML += `
            <div class="image-container" data-image-index="${ index }" id="mup-image-${ index }" data-acceptable-image="${ +isImageSizeAcceptable }" >
                <div class="image-size"> ${ imageSize['size'] + ' ' + imageSize['unit'] } </div>
                ${ !isImageSizeAcceptable ? `<div class="exceeded-size"> greater than ${ maxSize } MB </div>` : '' }
                <img src="${ URL.createObjectURL( this.files[ index ]) }"  class="image-preview" alt="" />
            </div>`;

                        if (!isImageSizeAcceptable)
                            unAcceptableImagesIndices.push(index)

                    }

                    unAcceptableImagesIndices.forEach((index) => self.#removeFileFromInput(index, false))

                }

            });

            // event for deleting uploaded images
            document.addEventListener('click', function(e) {

                if (e.target.className === 'image-container') // clicked on remove pseudo element
                {
                    const imageIndex = e.target.getAttribute(`data-image-index`)
                    const imageIsAcceptable = e.target.getAttribute(`data-acceptable-image`)

                    e.target.remove() // remove the html element from the dom

                    if (+imageIsAcceptable)
                        self.#removeFileFromInput(imageIndex)

                    if (document.querySelectorAll('.image-container').length ===
                        0) // if there are no images
                        self.clear();


                    self.#reorderFilesIndices(); // reorder images indices
                }

            });



            return this;

        }

        clear() {
            this.#multipleUploader.querySelectorAll('.image-container').forEach(image => image.remove());
            this.#multipleUploader.querySelectorAll('.mup-msg').forEach(msg => msg.style.setProperty('display',
                'flex'));
            this.#$imagesUploadInput.value = [];
        }

        #removeFileFromInput(deletedIndex) {
            // remove the delete file from input
            const dt = new DataTransfer()

            for (const [index, file] of Object.entries(this.#$imagesUploadInput.files)) {
                if (index != deletedIndex)
                    dt.items.add(file)
            }

            this.#$imagesUploadInput.files = dt.files
            // remove the delete file from input

        }

        #reorderFilesIndices() {
            document.querySelectorAll('.image-container').forEach((element, index) => {
                element.setAttribute('data-image-index', index.toString());
                element.setAttribute('id', `mup-image-${ index }`)
            });
        }

        #checkImageSize(imageIndex, imageSize, maxSize) {
            return imageSize['unit'] !== 'MB' || (imageSize['unit'] === 'MB' && (imageSize['size'] <=
            maxSize)); // return true if acceptable
        }

        #bytesToSize(bytes) {
            const sizes = ['Bytes', 'KB', 'MB']

            const i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)), 10)

            if (i === 0)
                return {
                    size: bytes,
                    unit: sizes[i]
                }
            else
                return {
                    size: (bytes / (1024 ** i)).toFixed(1),
                    unit: sizes[i]
                }

        }


    }
</script>
