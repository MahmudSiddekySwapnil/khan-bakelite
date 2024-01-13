@extends('landing_view.layouts.layouts_template')
@section('container')
    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <h2>Gallery</h2>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li>Gallery</li>
                    </ol>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->


    <!-- start of services -->
    <section class="section-padding services-grid-section">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="services-grids services-grid-view">
                        @foreach($company_gallery as $gallery)
                        <div class="grid">
                            <div class="inner mk-bg-img">
                                <div class="details ">
                                    <div class="info">
                                        <img src="{{ asset('storage/media/gallery/' . $gallery->picture) }}" alt class="bg-image">
                                        <a href="#">
                                            <h3>{{$gallery->title}}</h3>
                                        </a>
                                        <p>{{$gallery->description}}</p>
{{--                                        <a href="/single_service_details?id={{$gallery->id}}" class="more">Get Details</a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div> <!-- end services-grids -->
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- end container -->
    </section>
    <!-- end of services -->


@endsection
