<?php

namespace App\Http\Controllers\landingViewController;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index(){
       return view('landing_view.pages.home');
    }
}
