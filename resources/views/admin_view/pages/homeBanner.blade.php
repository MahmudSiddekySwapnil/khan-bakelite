@extends('admin_view.layouts.layouts')
@section('container')
    <div class="content-page">
        <div class="content">

        <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="hstack gap-2 flex-wrap">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Banner Upload</button>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Banner Upload</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Banner Title:</label>
                                            <input type="text" class="form-control" id="banner_title">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Banner Description:</label>
                                            <textarea class="form-control" id="banner_description"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="col-form-label" for="image">Choose Banner:</label>
                                            <input type="file" name="image" id="banner" class="form-control">
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="bannerSubmitForm">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
        </div> <!-- end col -->
    </div>
    <script src="admin_assets/js/HomeBanner.js"></script>

@endsection
