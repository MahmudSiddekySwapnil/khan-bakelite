<?php

namespace App\Http\Controllers\adminViewController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeBanner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class HomeBannerController extends Controller
{
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

            if ($request->hasFile('picture')) {
                $image = $request->file('picture');
                $imageContents = file_get_contents($image->getRealPath());
                $imageHash = md5($imageContents); // Calculate the MD5 hash of the image content.

                // Check if an image with the same hash already exists in the database.
                $existingImage = HomeBanner::where('image_hash', $imageHash)->first();

                if ($existingImage) {
                    // An image with the same content already exists.
                    return response()->json(['message' => 'Image already exists'], 400);
                }

                // If the image is unique, proceed with saving it.
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/media/banner', $imageName);
                $imageUrl = asset('storage/media/banner/' . $imageName);
                $model->image_url = $imageUrl;
                $model->picture = $imageName;
            }

            $model->title = $request->title;
            $model->description = $request->description;
            $model->status = 1;
            $model->image_hash = $imageHash; // Store the image hash in the database.
            $model->save();
            return response()->json(['message' => 'successful', 'url' => 'home_banner']);
        }
    }

    public function showBannerData(Request $request){
//        $homeBanners = HomeBanner::select('picture', 'title', 'description', 'status', 'image_url')
//            ->get();
//        return $returnedJson= array("data" => $homeBanners);

        $query = HomeBanner::all();
//        Log::info($query);
        return $returnedJson = array("data" => $query);
    }


    public function mangeBannerStatus(Request $request){

        $model=HomeBanner::find($request->id);
        $model->status=$request->status;
        $model->save();
        return response()->json(['message' => 'successful','url'=>'/home_banner','status'=>$request->status]);

    }




    public function deleteBanner($id)
    {
        $image = HomeBanner::find($id);
        if (!$image) {
            return response()->json(['message' => 'Image not found'], 404);
        }
        $path= 'public/media/banner/';
        Storage::delete($path . $image->picture);
        $image->delete();

        return response()->json(['message' => 'successful','url'=>'/home_banner']);
    }



}
