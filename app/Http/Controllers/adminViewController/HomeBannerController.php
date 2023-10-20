<?php

namespace App\Http\Controllers\adminViewController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeBanner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Services\ImageDeleteService;
use App\Services\ImageUploadService;

class HomeBannerController extends Controller
{
    protected $imageDeleteService;
    protected $imageUploadService;

    public function __construct(ImageDeleteService $imageDeleteService, ImageUploadService $imageUploadService)
    {
        $this->imageDeleteService = $imageDeleteService;
        $this->imageUploadService = $imageUploadService;

    }

    //
    public function index()
    {
        return view('admin_view.pages.homeBanner');
    }

    public function bannerProcessing(Request $request)
    {

        $validationRules = [
            'picture' => 'required|mimes:jpeg,jpg,png',
            'title' => 'required',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            // Validation failed, including the 'picture' not being uploaded.
            return response()->json(['message' => 'please check your file extension support only (jpeg,jpg,png)']);
        } else {
            // Validation passed, and 'picture' is uploaded.
            $model = new HomeBanner();
            $path = "media/banner";
            $result = $this->imageUploadService->imageUploadService($request, 'home_banner', $path);

            if ($result['message'] == "exists") {
                return response()->json(['message' => 'Image already exists']);

            } else {
                $model->image_url = $result['image_url'];
                $model->picture = $result['picture'];
                $model->image_hash = $result['image_hash']; // Store the image hash in the database.
                $model->title = $request->title;
                $model->description = $request->description;
                $model->status = 1;
                $model->save();
                return response()->json(['message' => 'successful', 'url' => 'home_banner']);
            }


        }
    }

    public function showBannerData(Request $request)
    {
        $query = HomeBanner::all();
        return $returnedJson = array("data" => $query);
    }


    public function mangeBannerStatus(Request $request)
    {

        $model = HomeBanner::find($request->id);
        $model->status = $request->status;
        $model->save();
        return response()->json(['message' => 'successful', 'url' => '/home_banner', 'status' => $request->status]);

    }


    public function deleteBanner($id)
    {
        $url = '/home_banner';
        $path = 'public/media/banner/';
        return $this->imageDeleteService->deleteImage(HomeBanner::class, $id, $path, $url);

    }


}
