<?php

namespace App\Http\Controllers\landingViewController;
use App\Models\HomeBanner;
use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    //
    public function index(){
        $result['company_service']=Service::where('status', 1)->get();
        $result['home_banner']= HomeBanner::where('status', 1)->get();
//        echo "<pre>";
//        print_r($result);
//        die();
       return view('landing_view.pages.home',$result);
    }

}
