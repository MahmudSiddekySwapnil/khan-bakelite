@extends('admin_view.layouts.layouts')
@extends('admin_view.common.datatableHeader')
@section('container')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <div class="content-page">
        <div class="content"> &nbsp;
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                           <div class="container mt-5">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf

                                <!-- Product Name -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="productName">Product Name:</label>
                                            <input type="text" class="form-control" id="productName" name="productName"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="productPrice">Product Price:</label>
                                            <input type="number" class="form-control" id="productPrice"
                                                   name="productPrice"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="productPrice">Product Warrenty:</label>
                                            <input type="number" class="form-control" id="productPrice"
                                                   name="productPrice"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Price -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="productName">Product Slug:</label>
                                            <input type="text" class="form-control" id="productName" name="productName"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="productPrice">Product Key:</label>
                                            <input type="text" class="form-control" id="productPrice"
                                                   name="productPrice"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="productPrice">Product Warrenty:</label>
                                            <input type="number" class="form-control" id="productPrice"
                                                   name="productPrice"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Extra Information -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="extraInfo">Product Description:</label>
                                            <textarea class="form-control" id="extraInfo" name="extraInfo"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="extraInfo">Product Short Description:</label>
                                            <textarea class="form-control" id="extraInfo" name="extraInfo"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="extraInfo">Product Technical Specification:</label>
                                            <textarea class="form-control" id="extraInfo" name="extraInfo"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Image Preview -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="productImage">Product Image:</label>
                                            <input type="file" class="form-control-file" id="productImage"
                                                   name="productImage[]"
                                                   accept="image/*" required
                                                   onchange="previewImage(this, 'productImagePreview')">
                                            <img id="productImagePreview" class="img-thumbnail mt-2"
                                                 style="max-width: 200px; max-height: 200px;"
                                                 alt="Product Image Preview">
                                        </div>
                                    </div>
                                </div>
                                <!-- Additional Image Upload Fields with Preview -->
                                <div id="additionalImages"></div>
                                <button type="button" class="btn btn-secondary mt-2" onclick="addImageField()">Add More
                                    Images
                                </button>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary mt-3">Upload Product</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS and jQuery (required for some Bootstrap features) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        function addImageField() {
            var additionalImages = document.getElementById('additionalImages');
            var newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.className = 'form-control-file mt-2';
            newInput.name = 'productImage[]';
            newInput.accept = 'image/*';
            newInput.setAttribute('onchange', 'previewImage(this, "additionalImagePreview' + additionalImages.childElementCount + '")');

            var previewImage = document.createElement('img');
            previewImage.id = 'additionalImagePreview' + additionalImages.childElementCount;
            previewImage.className = 'img-thumbnail mt-2';
            previewImage.style.maxWidth = '200px';
            previewImage.style.maxHeight = '200px';
            previewImage.alt = 'Additional Image Preview';

            additionalImages.appendChild(newInput);
            additionalImages.appendChild(previewImage);
        }

        function previewImage(input, imageId) {
            var preview = document.getElementById(imageId);
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
            }
        }
    </script>

@endsection
