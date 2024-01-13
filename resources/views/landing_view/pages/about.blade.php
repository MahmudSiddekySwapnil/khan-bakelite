@extends('landing_view.layouts.layouts_template')
@section('container')
<!-- start page-title -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <h2>About us</h2>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>About us</li>
                </ol>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end page-title -->

@foreach($company_profile as $company_profile_details)
<!-- start offer -->
<section class="section-padding offer-section">
    <div class="container">
        <div class="row">
            <div class="col col-md-5">
                <div class="section-title-s3">
                    <h2>{{$company_profile_details->title}}</h2>
                </div>
                <div class="offer-text">
                    <p>{{$company_profile_details->description}}</p>
{{--                    <a href="#" class="theme-btn read-more">Read More</a>--}}
{{--                    <a href="#" class="theme-btn-s2 read-more">Company history</a>--}}
                </div>
            </div>
            <div class="col col-md-7">
                <div class="offer-pic">
                    <img src="landing_assets/images/offer-pic.jpg" alt>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end offer -->



<!-- start features -->
<section class="features section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-md-12">
                <div class="features-title">
                    <h2>Company History</h2>
                    <p>{{$company_profile_details->company_history}}</p>
                </div>
            </div>
        </div>
&nbsp;

        <div class="row">
            <div class="col col-md-6">
                <div class="features-title">
                    <h2>Mission</h2>
                    <p>{{$company_profile_details->mission}}</p>
                </div>
            </div>
            <div class="col col-md-6">
                <div class="features-title">
                    <h2>Vision</h2>
                    <p>{{$company_profile_details->vision}}</p>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end features -->
@endforeach


<!-- start our-team -->
<section class="our-team our-team-bg section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-md-8 col-md-offset-2">
                <div class="section-title-s5">
                    <h2>Our team</h2>
                </div>
            </div>
        </div> <!-- end row -->

        <div class="row">
            <div class="col col-lg-10 col-lg-offset-1">


                <div class="team-slider team-grids">

                    @foreach($members_profile as $member_profile_show)
                    <div class="team-grid">
                        <div class="member-pic-social square-hover-effect-parent">
                            <div class="square-hover-effect">
                                <span class="hover-1"></span>
                                <span class="hover-2"></span>
                                <span class="hover-3"></span>
                                <span class="hover-4"></span>
                            </div>
                            <div class="member-pic">
                                <img src="{{ asset('storage/media/member/' . $member_profile_show->team_member_image) }}" alt class="slider-bg">
                            </div>
                            <div class="social">
                                <ul class="social-links">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="member-info">
                            <h3>{{$member_profile_show->team_member}}</h3>
                            <p>{{$member_profile_show->team_member_designation}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>

    </div> <!-- end container -->
</section>
<!-- end our-team -->


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

@endsection
