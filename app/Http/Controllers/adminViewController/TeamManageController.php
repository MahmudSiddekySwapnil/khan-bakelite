<?php

namespace App\Http\Controllers\adminViewController;

use App\Http\Controllers\Controller;
use App\Models\TeamMembersProfile;
use Illuminate\Http\Request;
use App\Models\HomeBanner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Services\ImageDeleteService;
use App\Services\ImageUploadService;

class TeamManageController extends Controller
{
    protected $imageDeleteService;
    protected $imageUploadService;

    public function __construct(ImageDeleteService $imageDeleteService, ImageUploadService $imageUploadService)
    {
        $this->imageDeleteService = $imageDeleteService;
        $this->imageUploadService = $imageUploadService;

    }

    public function index()
    {
        return view('admin_view.pages.teamManage');
    }

    public function teamProfileManage(Request $request)
    {

        $validationRules = [
            'picture' => 'required|mimes:jpeg,jpg,png',
            'team_designation' => 'required',
            'team_member' => 'required',
        ];
        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            // Validation failed, including the 'picture' not being uploaded.
            return response()->json(['message' => 'please check your file extension support only (jpeg,jpg,png)']);
        } else {
            // Validation passed, and 'picture' is uploaded.
            $model = new TeamMembersProfile();
            $path = "media/member";
            $result = $this->imageUploadService->imageUploadService($request, 'team', $path);

            if ($result['message'] == "exists") {
                return response()->json(['message' => 'Image already exists']);

            } else {
                $model->team_member_designation = $request->team_designation;
                $model->team_member = $request->team_member;
                $model->image_hash = $result['image_hash']; // Store the image hash in the database.
                $model->image_url = $result['image_url'];
                $model->team_member_image = $result['picture'];
                $model->status = 1;
                $model->save();
                return response()->json(['message' => 'successful', 'url' => 'team_profile']);
            }


        }
    }

    public function showTeamMemberProfileDetails(Request $request)
    {
        $query = TeamMembersProfile::all();
        return $returnedJson = array("data" => $query);
    }


    public function mangeTeamProfileStatus(Request $request)
    {
        $model = TeamMembersProfile::find($request->id);
        $model->status = $request->status;
        $model->save();
        return response()->json(['message' => 'successful', 'url' => '/team_profile', 'status' => $request->status]);

    }


    public function deleteTeamMemberProfile($id)
    {
        $url = '/team_profile';
        $path = 'public/media/member/';
        return $this->imageDeleteService->deleteImage(TeamMembersProfile::class, $id, $path, $url);

    }

}
