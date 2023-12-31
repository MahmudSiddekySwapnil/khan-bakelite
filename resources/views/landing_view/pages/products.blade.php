@extends('landing_view.layouts.layouts_template')
@section('container')
    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <h2>Shop</h2>
                    <ol class="breadcrumb">
                        <li><a href="index-2.html">Home</a></li>
                        <li>Shop</li>
                    </ol>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->


    <!-- start products-section -->
    <section class="products-section shop section-padding">
        <div class="container">
            <div class="row products-grids">
                @foreach($products_list as $products)
                <div class="col col-md-4 col-xs-6">

                    <div class="grid">
                        <div class="img-holder-info-list">
                            <div class="img-holder">
                                <img src="{{ asset('storage/media/product/' . $products->image) }}" alt class="img img-responsive">
                            </div>
                            <div class="info-list">
                                <div>
                                    <a href="/productDetails?id={{$products->id}}"><img src="landing_assets/images/shop/icons/icon-1.png" alt></a>
                                </div>
                                <div>
                                    <a href="/productDetails"><img src="landing_assets/images/shop/icons/icon-2.png" alt></a>
                                </div>
                                <div>
                                    <a href="/productDetails"><img src="landing_assets/images/shop/icons/icon-3.png" alt></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3><a href="#">{{ $products->product_name }}</a></h3>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <span class="price">Tk {{ $products->product_price }}</span>
                        </div>
                    </div>

                </div>
                @endforeach
            </div> <!-- end row -->


            <div class="pagination-wrapper">
                <ul class="pg-pagination">
                    {{-- Previous Page Link --}}
                    @if ($products_list->onFirstPage())
                        <li class="disabled">
                            <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $products_list->previousPageUrl() }}" aria-label="Previous">
                                <i class="fa fa-angle-double-left"></i>
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @for ($page = 1; $page <= $products_list->lastPage(); $page++)
                        <li class="{{ $page == $products_list->currentPage() ? 'active' : '' }}">
                            <a href="{{ $products_list->url($page) }}">{{ $page }}</a>
                        </li>
                    @endfor

                    {{-- Next Page Link --}}
                    @if ($products_list->hasMorePages())
                        <li>
                            <a href="{{ $products_list->nextPageUrl() }}" aria-label="Next">
                                <i class="fa fa-angle-double-right"></i>
                            </a>
                        </li>
                    @else
                        <li class="disabled">
                            <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                        </li>
                    @endif
                </ul>
            </div>

        </div> <!-- end container -->
    </section>
    <!-- end products-section -->

@endsection
