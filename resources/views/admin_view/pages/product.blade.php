@extends('admin_view.layouts.layouts')
@extends('admin_view.common.datatableHeader')
@section('container')
    <style>
        body
        {
            background-color:#f5f5f5;
        }
        .imagePreview {
            width: 200px;
            height: 180px;
            background-position: center center;
            background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
            background-color:#fff;
            background-size: cover;
            background-repeat:no-repeat;
            display: inline-block;
            box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
        }
        .btn-primary
        {
            display:block;
            border-radius:0px;
            box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
            margin-top:-5px;
        }
        .imgUp
        {
            margin-bottom:15px;
        }
        .del
        {
            top:0px;
            right:15px;
            width:200px;
            height:30px;
            text-align:center;
            line-height:30px;
            background-color:darkgrey;
            cursor:pointer;
            color: white;
            font-weight: bold;
        }
        .imgAdd
        {
            width:30px;
            height:30px;
            border-radius:50%;
            background-color:#4bd7ef;
            color:#fff;
            box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
            text-align:center;
            line-height:30px;
            margin-top:0px;
            cursor:pointer;
            font-size:15px;
        }
    </style>
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
                                                            <a href="{{route('products_manage')}}" class="btn btn-primary">Product Manage</a>
                                                        </div>

                                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                                             aria-labelledby="exampleModalLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Product Upload</h5>
                                                                        <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="mb-3">
                                                                                <label for="recipient-name"
                                                                                       class="col-form-label">Banner
                                                                                    Title:</label>
                                                                                <input type="text" class="form-control"
                                                                                       id="banner_title">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="message-text"
                                                                                       class="col-form-label">Banner
                                                                                    Description:</label>
                                                                                <textarea class="form-control"
                                                                                          id="banner_description"></textarea>
                                                                            </div>

                                                                            <br><div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-sm-5 imgUp">
                                                                                        <div class="imagePreview" style="width: 460px;"></div>
                                                                                        <label class="btn btn-primary" style="width:460px;">
                                                                                            Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                                                                        </label>
                                                                                    </div><!-- col-2 -->
                                                                                </div><!-- row -->
                                                                            </div><!-- container -->

                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <i class="fa fa-plus imgAdd" title="add more image"></i>

                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close
                                                                        </button>
                                                                        <button type="button" class="btn btn-primary"
                                                                                id="bannerSubmitForm">Save
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
                                                            <th>Product Name</th>
                                                            <th>Product Price</th>
                                                            <th>Product slug</th>
                                                            <th>Product quantity</th>
                                                            <th>Product Key</th>
                                                            <th>Product short Des.</th>
                                                            <th>Product Des.</th>
                                                            <th>Product warranty</th>
                                                            <th>Technical Specification</th>
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
        </div>
    </div>

    <script type="text/javascript" language="javascript">
        let table = $('#example').DataTable({
            ajax: {
                url: "{{url('/show_product_details')}}",
            },
            searching: true,
            scrollX: true,
            scrollY: true,
            language: {
                decimal: ',',
                thousands: '.'
            },
            "columns": [
                {data: "id"},
                {
                    data: "image_url",
                    render: function (data, type, row) {
                        // Assuming "picture" contains the file path of the image
                        return '<img class="image-modal" src="' + data + '" width="150" height="100" />';
                    }
                },
                {data: "product_name"},
                {data: "product_price"},
                {data: "product_slug"},
                {data: "product_quantity"},
                {data: "product_key"},
                {data: "product_short_description"},
                {data: "product_description"},
                {data: "warranty"},
                {data: "technical_specification"},
                {
                    data: null,
                    render: function (data, type, row) {
                        var status = parseInt(row.status);
                        var id = row.id;
                        var buttonClass = status === 1 ? 'btn-success' : 'btn-danger';
                        var buttonText = status === 1 ? 'Active' : 'Deactive';
                        // Use a data attribute to store the ID for easy access in the click event
                        return `<button  type="button" data-id="${id}" class="btn ${buttonClass} status-button">${buttonText}</button>`;
                    }
                },
                {
                    data: null,
                    render: function (data, type, row) {
                        var id = row.id;
                        return `<button type="button" data-id="${id}" class="btn btn-danger delete-button">Delete</button>`
                    }
                },

            ],
        });

        $('#example tbody').on('click', 'button.status-button', function () {
            var button = this;
            let data = table.row($(this).closest('tr')).data();
            let status = parseInt(data.status);
            let id = data.id;
            status = status === 1 ? 0 : 1;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const params = {
                id: id,
                status: status,
            };
            const formData = new URLSearchParams(params);
            let url = '/manage_product_status';
            fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': csrfToken,
                },
            }).then(response => response.json()) // Parse the JSON response
                .then(data => {
                    let message = data.message;
                    if (message === 'successful') {
                        window.location.href = data.url;
                    } else {
                        // Handle the error case if needed
                    }
                }).catch((err) => {
                console.error(err);
            })
        });
        $('#example tbody').on('click', 'img.image-modal', function () {
            const imageUrl = $(this).attr('src');
            // Open the modal and set the image source
            $('#imageModal').modal('show');
            $('#fullImage').attr('src', imageUrl);
        });
    </script>


    <script>
        $('#example tbody').on('click', 'button.delete-button', function () {
            if (confirm("Are you sure you want to delete this image?")) {
                const id = $(this).data('id');
                // Send an AJAX request to delete the image
                $.ajax({
                    url: '/delete_product/' + id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.message === 'successful') {
                            window.location.href = data.url;
                        }
                    },
                    error: function (err) {
                        console.error(err);
                    }
                });
            }
        });

    </script>

@endsection
