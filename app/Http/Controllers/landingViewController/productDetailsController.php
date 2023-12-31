<?php

namespace App\Http\Controllers\landingViewController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAdditionalImage;
use Illuminate\Http\Request;

class productDetailsController extends Controller
{
    public function index(Request $request){
        $id = $request->input('id');
        $result['main_product'] = Product::where('id', $id)->get();
        $result['product_details'] = ProductAdditionalImage::where('product_id', $id)->get();
//        echo"<pre>";
//        print_r($result);
//        exit;
        return view('landing_view.pages.productDetails',$result);
    }
}
