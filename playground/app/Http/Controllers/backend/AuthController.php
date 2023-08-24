<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage(){
        return view('frontend.login');
    }


    public function loginPost(Request $request){
        if(auth()->guard('customer')->attempt($request->only(['email','password'])))
        {
            return redirect()->route('hi');
        }
    }

 
}
