<?php

namespace App\Http\Controllers\landingViewController;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryDetailsController extends Controller
{
    //
    public function index(){
        $result['company_gallery']=Gallery::where('status', 1)->get();

        return view('landing_view.pages.companyGallery',$result);
    }

    public function getGallery($offset, $limit) {
        $services = Gallery::skip($offset)->take($limit)->get();
        return response()->json($services);
    }



    public function singleGalleryDetails(Request $request){
        $id = $request->input('id'); // Retrieve the ID from the query parameter
        $company_gallery = Gallery::where('id', $id)->first();
        return view('landing_view.pages.companyGallery')->with('company_gallery', $company_gallery);

    }
}
