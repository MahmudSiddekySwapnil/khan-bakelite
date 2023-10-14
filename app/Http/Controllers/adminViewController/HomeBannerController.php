<?php

namespace App\Http\Controllers\adminViewController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeBanner;
use Illuminate\Support\Facades\Validator;

class HomeBannerController extends Controller
{
    //
    public function index(){
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
            return response()->json(['message' => 'failed']);
        }else{
            $model = new HomeBanner();
            if ($request->hasFile('picture')) {
                $image = $request->file('picture');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/media/banner', $imageName);
                $imageUrl = asset('storage/media/banner' . $imageName);
                $model->picture=$imageName;
            }
            $model->title = $request->title;
            $model->description = $request->description;
            $model->status = 1;
            $model->save();
            return response()->json(['message' => 'successful', 'url'=>'home_banner']);
        }


    }

}
