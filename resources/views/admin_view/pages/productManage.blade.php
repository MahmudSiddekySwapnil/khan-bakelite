@extends('admin_view.layouts.layouts')
@section('container')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <div class="content-page">
        <div class="content"> &nbsp;
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                           <div class="container mt-5">
                               <form enctype="multipart/form-data">
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
                                            <label for="productPrice">Product Warranty:</label>
                                            <input type="number" class="form-control" id="productWarranty"
                                                   name="productWarranty"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Price -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="productName">Product Slug:</label>
                                            <input type="text" class="form-control" id="productSlug" name="productSlug"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="productPrice">Product Key:</label>
                                            <input type="text" class="form-control" id="productKey"
                                                   name="productKey"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="productPrice">Product Quantity:</label>
                                            <input type="number" class="form-control" id="productQuantity"
                                                   name="productQuantity"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Extra Information -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="extraInfo">Product Description:</label>
                                            <textarea class="form-control" id="productDescription" name="productDescription"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="extraInfo">Product Short Description:</label>
                                            <textarea class="form-control" id="productShortDescription" name="productShortDescription"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="extraInfo">Product Technical Specification:</label>
                                            <textarea class="form-control" id="productTechnicalSpecification" name="productTechnicalSpecification"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Image Preview -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="productImage">Product Image:</label>
                                            <input type="file" class="form-control-file" id="productImage"
                                                   name=""
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
                               </form>
                                <button type="button" class="btn btn-secondary mt-2" onclick="addImageField()">Add More
                                    Images
                                </button>

                                <!-- Submit Button -->
                                <button type="button" id="productSubmitForm" class="btn btn-primary mt-3">Upload Product</button>

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

    </script>
    <script src="admin_assets/js/ProductManage.js"></script>
@endsection
