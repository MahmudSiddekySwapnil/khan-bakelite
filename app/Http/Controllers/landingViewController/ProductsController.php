<?php

namespace App\Http\Controllers\landingViewController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAdditionalImage;


class ProductsController extends Controller
{
    public function index(){
        $result['products_list'] = Product::where('status', 1)->paginate(20);
        return view('landing_view.pages.products',$result);
    }
}
