<?php

namespace App\Http\Controllers\adminViewController;

use App\Http\Controllers\Controller;

class ProductManageController extends Controller
{
   public function index(){
       return view('admin_view.pages.product');
   }

   public function manageProduct(){
       return view('admin_view.pages.productManage');
   }
}
