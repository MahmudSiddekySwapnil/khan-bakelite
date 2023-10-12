<?php

namespace App\Http\Controllers\adminViewController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
  public function index(){
      return view('admin_view.pages.login');
  }

    public function authData(Request $request){
        // Find the user by email
        $data = User::where('email', $request->email_address)->first();

        // Check if a user with the provided email exists
        if ($data) {
            $inputPassword = $request->password; // Get the password from the form
            // Compare the input password with the hashed password from the database
            if (Hash::check($inputPassword, $data->password)) {
//            return redirect('dashboard')->with('message', 'successful');
                return response()->json(['auth_message' => 'successful', 'url' => 'dashboard']);

            } else {
                // Passwords don't match, so the user is not authenticated
                return response()->json(['auth_message' => 'authFailed', 'url' => 'login']);
            }
        } else {
            // User with the provided email does not exist
            return response()->json(['auth_message' => 'Email Not Found', 'url' => 'login']);
        }
    }

}
