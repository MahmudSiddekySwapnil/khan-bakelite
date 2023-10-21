<?php

namespace App\Http\Controllers\adminViewController;

use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    //
    public function index(){
        return view('admin_view.pages.partners');
    }
}
