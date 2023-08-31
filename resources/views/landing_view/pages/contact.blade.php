@extends('landing_view.layouts.layouts_template')
@section('container')
<!-- start page-title -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <h2>Contact</h2>
                <ol class="breadcrumb">
                    <li><a href="index-2.html">Home</a></li>
                    <li>Contact</li>
                </ol>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end page-title -->


<!-- start contact-pg-section -->
<section class="contact-pg-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-md-3">
                <div class="contact-info">
                    <ul>
                        <li>
                            <div class="icon"><i class="fa fa-phone"></i></div>
                            <p><span>Hotline</span> +1 478 (2492) 54 </p>
                        </li>
                        <li>
                            <div class="icon"><i class="fa fa-envelope"></i></div>
                            <p><span>Email</span> support@industrial.com  </p>
                        </li>
                        <li>
                            <div class="icon"><i class="fa fa-clock-o"></i></div>
                            <p><span>Working Hours:</span> +1 478 (2492) 54 </p>
                        </li>
                        <li>
                            <div class="icon"><i class="fa fa-location-arrow"></i></div>
                            <p><span>Office</span> 1802 Stout Rd, Menomonie,WI 54751 </p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col col-md-offset-1 col-md-8">
                <div class="location-map" id="map">

                </div>
            </div>
        </div> <!-- end row -->
        <div class="row">
            <div class="col col-xs-12">
                <form class="contact-form form contact-validation-active row" id="contact-form-s2">
                    <div class="col col-sm-6">
                        <label for="f-name">First Name</label>
                        <input type="text" class="form-control" id="f-name" name="f_name">
                    </div>
                    <div class="col col-sm-6">
                        <label for="l-name">Last Name</label>
                        <input type="text" class="form-control" id="l-name" name="l_name">
                    </div>
                    <div class="col col-sm-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="col col-sm-6">
                        <label for="phone">Phone No</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="col col-sm-12">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="note"></textarea>
                    </div>
                    <div class="col col-sm-12 submit-btn">
                        <button class="theme-btn">Submit</button>
                        <div id="loader">
                            <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                        </div>
                    </div>
                    <div class="error-handling-messages">
                        <div id="success">Thank you</div>
                        <div id="error"> Error occurred while sending email. Please try again later. </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end contact-pg-section -->


<!-- start site-footer -->
<footer class="site-footer">
    <div class="upper-footer">
        <div class="container">
            <div class="row">
                <div class="col col-md-3 col-sm-6">
                    <div class="widget about-widget">
                        <div class="footer-logo"><img src="landing_assets/images/logo.png" alt></div>
                        <ul class="contact-info">
                            <li><i class="fa fa-home"></i> 555 Main St, Salt Lake City, UT 84101</li>
                            <li><i class="fa fa-phone"></i> +1-(547)-257</li>
                            <li><i class="fa fa-home"></i> Working Hours: <br>Mon-Fri (9 am - 8 pm)</li>
                        </ul>
                    </div>
                </div>

                <div class="col col-md-3 col-sm-6">
                    <div class="widget service-links-widget">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Agriculture Processing</a></li>
                            <li><a href="#">Chemical Research</a></li>
                            <li><a href="#">Metal Engineering</a></li>
                            <li><a href="#">Mechanical Engineering</a></li>
                            <li><a href="#">Petroleum &amp; Gas</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col col-md-3 col-sm-6">
                    <div class="widget quick-links-widget">
                        <h3>Navigation</h3>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Service</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Pricing</a></li>
                            <li><a href="#">News</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col col-md-3 col-sm-6">
                    <div class="widget twitter-feed-widget">
                        <h3>Twitter Feed</h3>
                        <ul>
                            <li>
                                <div class="text">
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Ed quia con sequuntur magni dolores.</p>
                                </div>
                                <div class="info-box">
                                    <i class="fa fa-twitter"></i>
                                    <strong><a href="#">@Mark Wahlberg</a></strong>
                                </div>
                            </li>
                            <li>
                                <div class="text">
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Ed quia con sequuntur magni dolores.</p>
                                </div>
                                <div class="info-box">
                                    <i class="fa fa-twitter"></i>
                                    <strong><a href="#">@Mark Wahlberg</a></strong>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end upper-footer -->
    <div class="copyright-info">
        <div class="container">
            <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
        </div>
    </div>
</footer>
<!-- end site-footer -->
</div>
<!-- end of page-wrapper -->
@endsection
