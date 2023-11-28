<?php

namespace App\Http\Controllers\landingViewController;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\Partner;
use App\Models\ServiceFact;
use App\Models\TeamMembersProfile;

class AboutController extends Controller
{
    //
    public function index(){
        $result['company_profile']=CompanyProfile::all();
        $result['service_fact']= ServiceFact::where('status', 1)->get();
        $result['company_partner']=Partner::where('status', 1)->get();
        $result['members_profile']= TeamMembersProfile::where('status', 1)->get();

        return view('landing_view.pages.about',$result);
    }
    public function getAboutData(){

    }
}
