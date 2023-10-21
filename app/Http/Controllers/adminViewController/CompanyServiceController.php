<?php

namespace App\Http\Controllers\adminViewController;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use App\Models\Service;
use App\Services\ImageDeleteService;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyServiceController extends Controller
{
    //

    protected $imageDeleteService;
    protected $imageUploadService;

    public function __construct(ImageDeleteService $imageDeleteService, ImageUploadService $imageUploadService)
    {
        $this->imageDeleteService = $imageDeleteService;
        $this->imageUploadService = $imageUploadService;

    }

    /**
     * @author mahmud siddeky swapnil
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin_view.pages.companyService');
    }

    public function addServiceDetails(Request $request){
        $validationRules = [
            'picture' => 'required|mimes:jpeg,jpg,png',
            'title' => 'required',
            'company_description' => 'required',
            'service_description' => 'required',
        ];
        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            // Validation failed, including the 'picture' not being uploaded.
            return response()->json(['message' => 'please check your file extension support only (jpeg,jpg,png)']);
        } else {
            // Validation passed, and 'picture' is uploaded.
            $model = new Service();
            $path = "media/service";
            $result = $this->imageUploadService->imageUploadService($request, 'service', $path);

            if ($result['message'] == "exists") {
                return response()->json(['message' => 'Image already exists']);

            } else {
                $model->image_url = $result['image_url'];
                $model->picture = $result['picture'];
                $model->image_hash = $result['image_hash']; // Store the image hash in the database.
                $model->title = $request->title;
                $model->company_description = $request->company_description;
                $model->service_description = $request->service_description;
                $model->status = 1;
                $model->save();
                return response()->json(['message' => 'successful', 'url' => 'company_service']);
            }
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function showServiceDetails(Request $request)
    {
        $query = Service::all();
        return $returnedJson = array("data" => $query);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function mangeServiceStatus(Request $request)
    {

        $model = Service::find($request->id);
        $model->status = $request->status;
        $model->save();
        return response()->json(['message' => 'successful', 'url' => '/company_service', 'status' => $request->status]);

    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteService($id)
    {
        $url = '/company_service';
        $path = 'public/media/service/';
        return $this->imageDeleteService->deleteImage(Service::class, $id, $path, $url);

    }

}
