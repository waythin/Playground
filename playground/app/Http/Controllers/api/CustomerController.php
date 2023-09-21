<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function Laravel\Prompts\password;

class CustomerController extends Controller
{
    public function registration(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' =>  'required',
            'phone' => 'required',
            'password' => 'required'
        ]);
        if ($validate->fails()) {
            return $this->responseWithError([], $validate->getMessageBag());
        }

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);
        return $this->responseWithSuccess($customer, 'Registration success!');
    }

    public function login(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validate->fails()) {
            return $this->responseWithError([], $validate->getMessageBag());
        }

        $credentials = $request->only('email', 'password');
        // dd($credentials);
        $token = auth('api')->attempt($credentials);

        // dd($credentials);
        if ($token) {
            return $this->responseWithSuccess($token, 'login success');
        }
        return $this->responseWithError([], 'Invalid!');
    }

    public function logout()
    {
        if (auth('api')) {
            auth('api')->logout();
            return $this->responseWithSuccess([], 'Logout Success');
        }
        return $this->responseWithError([], 'No user found!');
    }
}
