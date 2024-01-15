<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    // go to changePassword Page
    public function changePasswordPage(){
        return view('admin.account.changePassword');
    }

    /*  Requirements change password

        - All input fields must be filled (required)
        - NewPassword, Confirm Password must be the same
        - NewPassword, Confirm Password must be at least 8 characters
        - Old Password must be correct
    */

    // change password
    public function changePassword(Request $req){
        $this->validatePassword($req);
        $currentUserId = Auth::user()->id;
        // SELECT password FROM users WHERE id = $currentUserId;
        $userData = User::select('password')->where('id', $currentUserId)->first();
        $dbPassword = $userData->password;

        // check if old password is correct
        if(Hash::check($req->oldPassword, $dbPassword)){

            $data = [
                'password' => Hash::make($req->newPassword)
            ];
            User::where('id', Auth::user()->id)->update($data);

            // log out the current user
            // Auth::logout();
            Auth::guard('web')->logout();

            return redirect()->route('auth#login');
            
        }

        return back()->with(['notMatch' => 'Credentials do not match!']);

    }

    // private functions

    // validate change password fields
    public function validatePassword($req){
        Validator::make($req->all(),[
            'oldPassword' => 'required|min:8',
            'newPassword' => 'required|min:8',
            'confirmPassword'=> 'required|min:8|same:newPassword',
        ])->validate();
    }

}
