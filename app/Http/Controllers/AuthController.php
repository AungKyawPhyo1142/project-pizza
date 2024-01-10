<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // go to loginPage
    public function loginPage(){
        return view('login');
    }

    // go to registerPage
    public function registerPage(){
        return view('register');
    }

    // go to dashboard
    public function dashboard(){
        if(Auth::user()->role == 'admin'){
            // redirect to admin dashboard
            return redirect()->route('admin#categoryList');
        }
        else {
            // redirect to user dashboard
            return redirect()->route('user#list');
        }
    }
}
