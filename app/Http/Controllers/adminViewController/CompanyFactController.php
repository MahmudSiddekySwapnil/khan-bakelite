<?php

namespace App\Http\Controllers\adminViewController;

use App\Http\Controllers\Controller;
use App\Models\ServiceFact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyFactController extends Controller
{
    //
    public function index(){
        return view('admin_view.pages.companyServiceFact');
    }

    public function manageServiceFact(Request $request){
        $validationRules = [
            'project_no' => 'required',
            'project_des' => 'required',
            'client_no' => 'required',
            'client_des' => 'required',
            'happy_client_no' => 'required',
            'happy_client_des' => 'required',
        ];
        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            // Validation failed, including the 'picture' not being uploaded.
            return response()->json(['message' => 'please check your input']);
        } else {
            $model = new ServiceFact();
            $model->project_no = $request->project_no;
            $model->project_des = $request->project_des;
            $model->client_no = $request->client_no;
            $model->client_des = $request->client_des;
            $model->satisfaction_no = $request->happy_client_no;
            $model->satisfaction_des = $request->happy_client_des;
            $model->status=0;
            $model->save();
                return response()->json(['message' => 'successful', 'url' => 'company_service_fact']);
            }
    }


    public function showCompanyServiceFact(){
    $query = ServiceFact::all();
    return $returnedJson = array("data" => $query);
    }

    public function manageServiceFactStatus(Request $request)
    {

        $model = ServiceFact::find($request->id);
        $model->status = $request->status;
        $model->save();
        return response()->json(['message' => 'successful', 'url' => '/company_service_fact', 'status' => $request->status]);

    }

    public function deleteServiceFact($id)
    {
        $data = ServiceFact::find($id);
        $data->delete();
        return response()->json(['message' => 'successful', 'url' => '/company_service_fact']);

    }

}

