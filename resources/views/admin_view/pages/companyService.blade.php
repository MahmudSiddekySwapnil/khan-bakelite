@extends('admin_view.layouts.layouts')
@section('container')
    <div class="content-page">
        <div class="content"> &nbsp;
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <br>
                                            <div class="col-lg-12 ml-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="hstack gap-2 flex-wrap">
                                                            <button type="button" class="btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal"
                                                                    data-bs-whatever="@getbootstrap">Company Service
                                                            </button>
                                                        </div>

                                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                                             aria-labelledby="exampleModalLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Company Service</h5>
                                                                        <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="mb-3">
                                                                                <label for="recipient-name"
                                                                                       class="col-form-label">Service
                                                                                    Title:</label>
                                                                                <input type="text" class="form-control"
                                                                                       id="service_title">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="recipient-name"
                                                                                       class="col-form-label">Company Short Description
                                                                                    </label>
                                                                                <input type="text" class="form-control"
                                                                                       id="short_description">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="message-text"
                                                                                       class="col-form-label">Service
                                                                                    Description:</label>
                                                                                <textarea class="form-control"
                                                                                          id="service_description"></textarea>
                                                                            </div>

                                                                            <div class="mb-3">
                                                                                <label class="col-form-label"
                                                                                       for="image">Choose
                                                                                    Service Pic:</label>
                                                                                <input type="file" name="image"
                                                                                       id="service_pic"
                                                                                       class="form-control">
                                                                            </div>

                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">
                                                                            Close
                                                                        </button>
                                                                        <button type="button" class="btn btn-primary"
                                                                                id="serviceSubmitForm">Save
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- end card-body -->
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <section class="content">
                                                    <table id="example" class="display"
                                                           style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Picture</th>
                                                            <th>Title</th>
                                                            <th>Description</th>
                                                            <th>Status</th>
                                                            <th>Action</th>

                                                        </tr>
                                                        </thead>
                                                    </table>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- end col -->
    </div>







    <!-- Modal using for showing full image -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Service Details</b></h5>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="fullImage" src="" width="100%" height="auto"/>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <script src="admin_assets/js/CompanyService.js"></script>
@endsection
