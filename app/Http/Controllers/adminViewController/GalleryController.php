<?php

namespace App\Http\Controllers\adminViewController;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Services\ImageDeleteService;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    protected $imageDeleteService;
    protected $imageUploadService;

    public function __construct(ImageDeleteService $imageDeleteService, ImageUploadService $imageUploadService)
    {
        $this->imageDeleteService = $imageDeleteService;
        $this->imageUploadService = $imageUploadService;

    }
    public function index(){
        return view('admin_view.pages.CompanyGallery');
    }

    public function showGalleryData(Request $request)
    {
        $query = Gallery::all();
        return $returnedJson = array("data" => $query);
    }
    public function galleryProcessing(Request $request)
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
            $model = new Gallery();
            $path = "media/gallery";
            $result = $this->imageUploadService->imageUploadService($request, 'gallery', $path);

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
                return response()->json(['message' => 'successful', 'url' => 'gallery']);
            }


        }
    }
    public function mangeGalleryStatus(Request $request)
    {

        $model = Gallery::find($request->id);
        $model->status = $request->status;
        $model->save();
        return response()->json(['message' => 'successful', 'url' => '/gallery', 'status' => $request->status]);

    }


    public function deleteGallery($id)
    {
        $url = '/gallery';
        $path = 'public/media/gallery/';
        return $this->imageDeleteService->deleteImage(Gallery::class, $id, $path, $url);

    }
}
