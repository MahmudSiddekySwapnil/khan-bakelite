@extends('landing_view.layouts.layouts_template')
@section('container')
    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <h2>Services</h2>
                    <ol class="breadcrumb">
                        <li><a href="index-2.html">Home</a></li>
                        <li>Services</li>
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
                        @foreach($company_service as $services)
                        <div class="grid">
                            <div class="inner mk-bg-img">
                                <div class="details ">
                                    <div class="info">
                                        <img src="{{ asset('storage/media/service/' . $services->picture) }}" alt class="bg-image">
                                        <a href="service-single.html">
                                            <h3><i class="fi flaticon-construction"></i>{{$services->title}}</h3>
                                        </a>
                                        <p>{{$services->service_description}}</p>
                                        <a href="/single_service_details?id={{$services->id}}" class="more">Get Details</a>
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
