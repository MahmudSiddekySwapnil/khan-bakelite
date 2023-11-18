@extends('landing_view.layouts.layouts_template')
@section('container')
<!-- start page-wrapper -->

<div class="page-wrapper">

    <!-- start preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <img src="landing_assets/images/preloader.gif" alt>
        </div>
    </div>
    <!-- end preloader -->


    <!-- start of hero -->
    <section class="hero hero-slider-wrapper">
        <div class="hero-slider hero-slider-style-1">
           @foreach($home_banner as $list)
            <div class="slide">
                <img src="{{ asset('storage/media/banner/' . $list->picture) }}" alt class="slider-bg">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-8 col-sm-9 slide-caption">
                            <h2>We provide the best <span>{{ $list->title }}</span> Services worldwide</h2>
                            <p>{{ $list->description }}</p>
{{--                            <div class="btns">--}}
{{--                                <a href="#" class="theme-btn">About us</a>--}}
{{--                                <a href="#" class="theme-btn-s2">Explore</a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- end of hero slider -->
    <!-- start of services -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-lg-3 col-md-4">
                    <div class="section-title">
                        <h2>Our services</h2>
                    </div>
                </div>
                <div class="col col-lg-6 col-md-5">
{{--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>--}}
                </div>
                <div class="col col-lg-3 col-md-3">
                    <div class="all-service-link">
                        <a href="services.html" class="theme-btn">All services</a>
                    </div>
                </div>
            </div> <!-- end row -->

            <div class="row">
                <div class="col col-xs-12">
                    <div class="services-grids service-slider dots-s1">
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


    <!-- start testimonials -->
    <section class="testimonials section-padding parallax" data-bg-image="assets/images/testimonials/bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="testimonials-slider slider-arrow-s1">
                        <div class="slide-item">
                            <div class="inner">
                                <div class="client-quote">
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                                <div class="client-details">
                                    <div class="client-pic">
                                        <img src="landing_assets/images/testimonials/client.jpg" alt>
                                    </div>
                                    <div class="client-info">
                                        <h4>Danny Boyles</h4>
                                        <span>Director of Boards, Machinima</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item">
                            <div class="inner">
                                <div class="client-quote">
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                                <div class="client-details">
                                    <div class="client-pic">
                                        <img src="landing_assets/images/testimonials/client.jpg" alt>
                                    </div>
                                    <div class="client-info">
                                        <h4>Danny Boyles</h4>
                                        <span>Director of Boards, Machinima</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end testimonials -->


    <!-- start offer -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-md-4">
                    <div class="section-title">
                        <h2>What we offer</h2>
                    </div>
                    <div class="offer-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisc ing elit, sed do eiusmod tempor inci didunt ut labore et dolore magna.</p>
                        <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur</p>
                        <a href="#" class="theme-btn read-more">Read More</a>
                    </div>
                </div>
                <div class="col col-md-8">
                    <div class="offer-grids">
                        <div class="grid">
                            <div class="details">
                                <div class="icon">
                                    <i class="fi flaticon-construction"></i>
                                </div>
                                <h3>Advanced Technology</h3>
                                <p>Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                <a href="#" class="offer-details">Details <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="details">
                                <div class="icon">
                                    <i class="fi flaticon-people"></i>
                                </div>
                                <h3>Expert Engineers</h3>
                                <p>Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                <a href="#" class="offer-details">Details <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="details">
                                <div class="icon">
                                    <i class="fi flaticon-support"></i>
                                </div>
                                <h3>Customer Support</h3>
                                <p>Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                <a href="#" class="offer-details">Details <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="details">
                                <div class="icon">
                                    <i class="fi flaticon-time-passing"></i>
                                </div>
                                <h3>Delivery On time</h3>
                                <p>Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                <a href="#" class="offer-details">Details <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end offer -->


    <!-- recent-project -->
    <section class="recent-projects section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-lg-8 col-lg-offset-2">
                    <div class="section-title-s2">
                        <h2>Recent Projects</h2>
                        <p>Lorem ipsum dolor sit amet, mel postea mio liore corrumpit ea. Affert partiendo vix eu. Ei mea dolore democritum disu artio.</p>
                    </div>
                </div>
            </div> <!-- end row -->
        </div>

        <div class="row">
            <div class="col col-xs-12">
                <div class="recent-projects-grids">
                    <div class="grid">
                        <div class="project-img">
                            <img src="landing_assets/images/projects/img-1.jpg" alt>
                        </div>
                        <div class="project-info">
                            <div class="inner-info">
                                <a href="#"><h3>Chemical Refinery</h3></a>
                                <div class="tags">Michigan, US</div>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="project-img">
                            <img src="landing_assets/images/projects/img-2.jpg" alt>
                        </div>
                        <div class="project-info">
                            <div class="inner-info">
                                <a href="#"><h3>Chemical Refinery</h3></a>
                                <div class="tags">Michigan, US</div>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="project-img">
                            <img src="landing_assets/images/projects/img-3.jpg" alt>
                        </div>
                        <div class="project-info">
                            <div class="inner-info">
                                <a href="#"><h3>Chemical Refinery</h3></a>
                                <div class="tags">Michigan, US</div>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="project-img">
                            <img src="landing_assets/images/projects/img-4.jpg" alt>
                        </div>
                        <div class="project-info">
                            <div class="inner-info">
                                <a href="#"><h3>Chemical Refinery</h3></a>
                                <div class="tags">Michigan, US</div>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="project-img">
                            <img src="landing_assets/images/projects/img-5.jpg" alt>
                        </div>
                        <div class="project-info">
                            <div class="inner-info">
                                <a href="#"><h3>Chemical Refinery</h3></a>
                                <div class="tags">Michigan, US</div>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="project-img">
                            <img src="landing_assets/images/projects/img-2.jpg" alt>
                        </div>
                        <div class="project-info">
                            <div class="inner-info">
                                <a href="#"><h3>Chemical Refinery</h3></a>
                                <div class="tags">Michigan, US</div>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="project-img">
                            <img src="landing_assets/images/projects/img-3.jpg" alt>
                        </div>
                        <div class="project-info">
                            <div class="inner-info">
                                <a href="#"><h3>Chemical Refinery</h3></a>
                                <div class="tags">Michigan, US</div>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="project-img">
                            <img src="landing_assets/images/projects/img-4.jpg" alt>
                        </div>
                        <div class="project-info">
                            <div class="inner-info">
                                <a href="#"><h3>Chemical Refinery</h3></a>
                                <div class="tags">Michigan, US</div>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="project-img">
                            <img src="landing_assets/images/projects/img-5.jpg" alt>
                        </div>
                        <div class="project-info">
                            <div class="inner-info">
                                <a href="#"><h3>Chemical Refinery</h3></a>
                                <div class="tags">Michigan, US</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end recent-project -->






    <!-- start fun-fact -->
    <section class="fun-fact">
        <div class="container">
            <div class="row start-count">
                @foreach($service_fact as $company_service_fact)

                <div class="col col-sm-4">

                    <div class="grid">
                        <h3><span class="counter" data-count="{{$company_service_fact->project_no}}">00</span><span>+</span></h3>
                        <span class="fact-title">Projects</span>
                        <p>{{$company_service_fact->project_des}}</p>
                    </div>
                </div>
                <div class="col col-sm-4">
                    <div class="grid">
                        <h3><span class="counter" data-count="{{$company_service_fact->client_no}}">00</span><span>+</span></h3>
                        <span class="fact-title">Clients</span>
                        <p>{{$company_service_fact->client_des}}</p>
                    </div>
                </div>
                <div class="col col-sm-4">
                    <div class="grid">
                        <h3><span class="counter" data-count="{{$company_service_fact->satisfaction_no}}">00</span><span>%</span></h3>
                        <span class="fact-title">satisfaction</span>
                        <p>{{$company_service_fact->satisfaction_des}}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div> <!-- end container -->
    </section>
    <!-- end fun-fact -->






















    <!-- start partners -->
    <section class="section-padding partners">
        <h2 class="show" style="text-align: center">PARTNERS</h2>
        <hr>
        <div class="container">

            <div class="row">

                <div class="col col-xs-12">

                    <div class="partners-slider">
                        @foreach($company_partner as $list)

                        <div class="grid">
                            <img src="{{ asset('storage/media/partner/' . $list->picture) }}" alt class="slider-bg">
                        </div>
                        @endforeach

                    </div>
                </div>


            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end partners -->




    <!-- news-section -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-lg-3 col-md-4">
                    <div class="section-title">
                        <h2>Recent news</h2>
                    </div>
                </div>
                <div class="col col-lg-6 col-md-5">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                <div class="col col-lg-3 col-md-3">
                    <div class="all-news-link">
                        <a href="#" class="theme-btn">More News</a>
                    </div>
                </div>
            </div> <!-- end row -->

            <div class="row">
                <div class="col col-xs-12">
                    <div class="news-grids">
                        <div class="grid">
                            <div class="entry-media">
                                <img src="landing_assets/images/blog/img-1.jpg" alt>
                            </div>
                            <div class="entry-details">
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i>Nov 25</li>
                                        <li><i class="fa fa-comments"></i><a href="#">2 Comments</a></li>
                                    </ul>
                                </div>
                                <div class="entry-body">
                                    <h3><a href="#">China's industrial profits grow faster in first eight months</a></h3>
                                    <p>Inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="entry-media">
                                <img src="landing_assets/images/blog/img-2.jpg" alt>
                            </div>
                            <div class="entry-details">
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i>Nov 25</li>
                                        <li><i class="fa fa-comments"></i><a href="#">2 Comments</a></li>
                                    </ul>
                                </div>
                                <div class="entry-body">
                                    <h3><a href="#">Exploring the wild side in an industrial jungle</a></h3>
                                    <p>Inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="entry-media">
                                <img src="landing_assets/images/blog/img-3.jpg" alt>
                            </div>
                            <div class="entry-details">
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i>Nov 25</li>
                                        <li><i class="fa fa-comments"></i><a href="#">2 Comments</a></li>
                                    </ul>
                                </div>
                                <div class="entry-body">
                                    <h3><a href="#">Bus drivers in Liverpool vote for industrial action</a></h3>
                                    <p>Inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end news-section -->
</div>
<!-- end of page-wrapper -->
@endsection
