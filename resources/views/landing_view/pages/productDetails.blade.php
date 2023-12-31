@extends('landing_view.layouts.layouts_template')
@section('container')
    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <h2>Shop Details</h2>
                    <ol class="breadcrumb">
                        <li><a href="index-2.html">Home</a></li>
                        <li>Shop Details</li>
                    </ol>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->


    <!-- start sop-details-main-content -->
    <section class="shop-details-main-content section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-md-6">
                    <div class="shop-single-slider-wrapper">
                        @foreach($main_product as $parent_product)
                        <div class="slider-for">
                            <div><img src="{{ asset('storage/media/product/' . $parent_product->image) }}" class="img img-responsive" alt></div>
                        </div>
                        @endforeach

                            <div class="slider-nav">
                                @foreach($product_details as $child_product)
                            <div><img src="{{ asset('storage/media/extraImage/' . $child_product->picture) }}" class="img img-responsive" alt></div>
                                @endforeach

                            </div>

                    </div>
                </div>
                @foreach($main_product as $parent_product)
                <div class="col col-md-6">
                    <div class="product-details">
                        <h2>{{ $parent_product->product_name }}</h2>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <div class="price">
                            <span class="current">Tk {{$parent_product->product_price}}</span>
{{--                            <span class="old">$75.00</span>--}}
                        </div>
                        <p>{{ $parent_product->product_short_description }}</p>

                        <div class="product-option">
                            <form action="#" class="form">
                                <div class="p-row">
                                    <div>
                                        <input id="count-product" type="text" value="1" name="count-product">
                                    </div>
                                    <div>
                                        <button type="submit" class="btn theme-btn">Add to cart</button>
                                    </div>
                                    <div>
                                        <button class="btn theme-btn"><i class="fa fa-heart-o"></i></button>
                                        <span></span>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- end option -->
                    </div> <!-- end product details -->
                </div> <!-- end col -->
                @endforeach
            </div> <!-- end row -->

            <div class="row">
                @foreach($main_product as $parent_product)

                <div class="col col-xs-12">
                    <div class="product-info">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
{{--                            <li><a href="#review" data-toggle="tab">Technical Specification<span>3</span></a></li>--}}
{{--                            <li><a href="#tags" data-toggle="tab">Add tags</a></li>--}}
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="description">
                                <p>{{  $parent_product->product_description }}</p>
                            </div>
{{--                            <div role="tabpanel" class="tab-pane fade" id="review">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col col-md-6">--}}
{{--                                        <div class="client-review">--}}
{{--                                            <div class="client-pic">--}}
{{--                                                <img src="landing_assets/images/shop/review/img-1.jpg" alt>--}}
{{--                                            </div>--}}
{{--                                            <div class="details">--}}
{{--                                                <div class="name-rating-time">--}}
{{--                                                    <div class="name-rating">--}}
{{--                                                        <div>--}}
{{--                                                            <h4>Michel vance</h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="rating">--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star-o"></i>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="time">--}}
{{--                                                        <span>03 mins ago</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="review-body">--}}
{{--                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque.</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="client-review">--}}
{{--                                            <div class="client-pic">--}}
{{--                                                <img src="landing_assets/images/shop/review/img-2.jpg" alt>--}}
{{--                                            </div>--}}
{{--                                            <div class="details">--}}
{{--                                                <div class="name-rating-time">--}}
{{--                                                    <div class="name-rating">--}}
{{--                                                        <div>--}}
{{--                                                            <h4>Rocky</h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="rating">--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star-o"></i>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="time">--}}
{{--                                                        <span>03 mins ago</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="review-body">--}}
{{--                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque.</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="client-review">--}}
{{--                                            <div class="client-pic">--}}
{{--                                                <img src="landing_assets/images/shop/review/img-3.jpg" alt>--}}
{{--                                            </div>--}}
{{--                                            <div class="details">--}}
{{--                                                <div class="name-rating-time">--}}
{{--                                                    <div class="name-rating">--}}
{{--                                                        <div>--}}
{{--                                                            <h4>philip</h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="rating">--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star-o"></i>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="time">--}}
{{--                                                        <span>03 mins ago</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="review-body">--}}
{{--                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque.</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div> <!-- end col -->--}}

{{--                                    <div class="col col-md-6 review-form-wrapper">--}}
{{--                                        <div class="review-form">--}}
{{--                                            <h4>Here you can review this item</h4>--}}
{{--                                            <form>--}}
{{--                                                <div>--}}
{{--                                                    <input type="text" class="form-control" placeholder="Your Name *" required>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <input type="email" class="form-control" placeholder="Email *" required>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <textarea class="form-control" placeholder="Review *"></textarea>--}}
{{--                                                </div>--}}
{{--                                                <div class="rating-post">--}}
{{--                                                    <div class="rating">--}}
{{--                                                        <a href="#" title="1 Out of 5">--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                        </a>--}}
{{--                                                        <a href="#" title="2 Out of 5">--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                        </a>--}}
{{--                                                        <a href="#" title="3 Out of 5">--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"> </i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                        </a>--}}
{{--                                                        <a href="#" title="4 Out of 5">--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                        </a>--}}
{{--                                                        <a href="#" title="5 Out of 5">--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="submit">--}}
{{--                                                        <button type="submit" class="btn theme-btn">Post review</button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div role="tabpanel" class="tab-pane fade" id="tags">--}}
{{--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam minima non fuga hic harum, quis assumenda. Praesentium, impedit. Ipsam enim sed eos vero pariatur quibusdam distinctio, obcaecati unde fuga consequuntur!</p>--}}
{{--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam minima non fuga hic harum, quis assumenda. Praesentium, impedit. Ipsam enim sed eos vero pariatur quibusdam distinctio, obcaecati unde fuga consequuntur!</p>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div> <!-- end row -->
        </div> <!-- end of container -->
    </section>
    <!-- end of sop-details-main-content -->

@endsection
