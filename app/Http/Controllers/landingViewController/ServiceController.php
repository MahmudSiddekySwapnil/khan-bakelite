<?php

namespace App\Http\Controllers\landingViewController;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function index(){
        $result['company_service']=Service::where('status', 1)->get();

        return view('landing_view.pages.service',$result);
    }

    public function getServices($offset, $limit) {
        $services = Service::skip($offset)->take($limit)->get();
        return response()->json($services);
    }



    public function singleServiceDetails(Request $request){
        $id = $request->input('id'); // Retrieve the ID from the query parameter
        $company_service = Service::where('id', $id)->first();
        return view('landing_view.pages.serviceDetails')->with('company_service', $company_service);

    }
}
