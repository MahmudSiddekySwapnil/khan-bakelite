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
                            <p><span>Hotline</span>+8801686876007</p>
                        </li>
                        <li>
                            <div class="icon"><i class="fa fa-envelope"></i></div>
                            <p><span>Email</span> info@khanbp.com  </p>
                        </li>
                        <li>
                            <div class="icon"><i class="fa fa-clock-o"></i></div>
                            <p><span>Working Hours:</span>Sat-Fri (9 am - 8 pm)</p>
                        </li>
                        <li>
                            <div class="icon"><i class="fa fa-location-arrow"></i></div>
                            <p><span>Office</span>KHAN BAKELITE PRODUCTS, Bhatto 9370, Chulkati </p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col col-md-offset-1 col-md-8">
                <div>                <iframe style="width:900px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2890.2562304787975!2d89.64054887402641!3d22.68648432878913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff8babf55931b7%3A0xc8497e00e76e0629!2sKHAN%20BAKELITE%20PRODUCTS!5e1!3m2!1sen!2sbd!4v1704996710646!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
</script>

<script>
    function initMap() {
        // Specify the coordinates for the center of the map
        var myLatLng = { lat: YOUR_LATITUDE, lng: YOUR_LONGITUDE };

        // Create a new map instance
        var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 15 // You can adjust the zoom level as needed
        });

        // Add a marker to the map
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Your Location'
        });
    }
</script>

<!-- end of page-wrapper -->
@endsection
