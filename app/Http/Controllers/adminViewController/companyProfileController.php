<?php

namespace App\Http\Controllers\adminViewController;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class companyProfileController extends Controller
{
    //
    public function index(){
        return view('admin_view.pages.companyProfile');
    }

    public function companyProfileManage(Request $request){
        $validationRules = [
            'title' => 'required',
            'description' => 'required',
            'company_history' => 'required',
            'mission' => 'required',
            'vision' => 'required',
        ];

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            // Validation failed, including the 'picture' not being uploaded.
            return response()->json(['message' => 'Please check your input']);
        } else {
            // Check if any record exists in the CompanyProfile table
            $existingRecord = CompanyProfile::first();

            if ($existingRecord) {
                // Update the existing record
                $existingRecord->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'company_history' => $request->company_history,
                    'mission' => $request->mission,
                    'vision' => $request->vision,
                ]);
                return response()->json(['message' => 'Successful', 'url' => 'company_profile']);

            } else {
                // Insert a new record
                $newRecord = new CompanyProfile([
                    'title' => $request->title,
                    'description' => $request->description,
                    'company_history' => $request->company_history,
                    'mission' => $request->mission,
                    'vision' => $request->vision,
                ]);
                $newRecord->save();
                return response()->json(['message' => 'Successful', 'url' => 'company_profile']);

            }

        }
    }

public function showProfileDetails(){
    $model = CompanyProfile::all();
    return $model;
}


}
