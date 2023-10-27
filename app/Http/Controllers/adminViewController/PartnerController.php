<?php

namespace App\Http\Controllers\adminViewController;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\ImageDeleteService;
use App\Services\ImageUploadService;

class PartnerController extends Controller
{
    protected $imageDeleteService;
    protected $imageUploadService;

    public function __construct(ImageDeleteService $imageDeleteService, ImageUploadService $imageUploadService)
    {
        $this->imageDeleteService = $imageDeleteService;
        $this->imageUploadService = $imageUploadService;

    }

    //
    public function index(){
        return view('admin_view.pages.partners');
    }
    public function managePartner(Request $request){
        $validationRules = [
            'picture' => 'required|mimes:jpeg,jpg,png',
            'title' => 'required',
        ];
        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            // Validation failed, including the 'picture' not being uploaded.
            return response()->json(['message' => 'please check your file extension support only (jpeg,jpg,png)']);
        } else {
            // Validation passed, and 'picture' is uploaded.
            $model = new Partner();
            $path = "media/partner";
            $result = $this->imageUploadService->imageUploadService($request, 'partners', $path);

            if ($result['message'] == "exists") {
                return response()->json(['message' => 'Image already exists']);

            } else {
                $model->image_url = $result['image_url'];
                $model->picture = $result['picture'];
                $model->image_hash = $result['image_hash']; // Store the image hash in the database.
                $model->title = $request->title;
                $model->status = 1;
                $model->save();
                return response()->json(['message' => 'successful', 'url' => 'partners_management']);
            }


        }
    }


    public function managePartnerStatus(Request $request)
    {

        $model = Partner::find($request->id);
        $model->status = $request->status;
        $model->save();
        return response()->json(['message' => 'successful', 'url' => '/partners_management', 'status' => $request->status]);

    }
public function showPartnerDetails(Request $request){
    $query = Partner::all();
    return $returnedJson = array("data" => $query);
}
    public function deletePartnerLogo($id)
    {
        $url = '/partners_management';
        $path = 'public/media/partner/';
        return $this->imageDeleteService->deleteImage(Partner::class, $id, $path, $url);

    }

}
