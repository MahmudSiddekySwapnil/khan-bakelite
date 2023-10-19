<?php

namespace App\Http\Controllers\landingViewController;
use App\Models\HomeBanner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    //
    public function index(){
        $result['home_banner']= HomeBanner::where('status', 1)->get();
       return view('landing_view.pages.home',$result);
    }

}
