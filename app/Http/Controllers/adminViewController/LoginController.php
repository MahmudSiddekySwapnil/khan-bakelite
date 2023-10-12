<?php

namespace App\Http\Controllers\adminViewController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * @author Mahmud Siddeky Swapnil
     * this method is for showing login page.
     * if session hav admin login then it redirect to dashboard other wise it redirect to login page
     * this is handeled by middleware.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
      public function index(Request $request){
          if($request->session()->has('ADMIN_LOGIN')){
              return redirect('dashboard');
          }else{
              return view('admin_view.pages.login');
          }
      }

    /**@author Mahmud Siddeky Swapnil
     *Find the user by email
     *Check if a user with the provided email exists
     * Get the password from the form
     * Compare the input password with the hashed password from the database
     * Passwords don't match, so the user is not authenticated
     * User with the provided email does not exist
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

        public function authData(Request $request){
            $data = User::where('email', $request->email_address)->first();
            if ($data) {
                $inputPassword = $request->password;
                if (Hash::check($inputPassword, $data->password)) {
                    $request->session()->put('ADMIN_LOGIN',true);
                    return response()->json(['auth_message' => 'successful', 'url' => 'dashboard']);

                } else {
                    return response()->json(['auth_message' => 'authFailed', 'url' => 'login']);
                }
            } else {
                return response()->json(['auth_message' => 'Email Not Found', 'url' => 'login']);
            }
        }


        public  function adminLogout(Request $request){
            session()->flush();
            return redirect('login');
        }

}
