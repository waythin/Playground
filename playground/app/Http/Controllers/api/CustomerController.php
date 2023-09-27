<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Throwable;

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
            $name = auth('api')->name;
            return $this->responseWithSuccess([$token, $name], 'login success');
        }
        return $this->responseWithError([], 'Invalid!');
    }

    public function logout()
    {
        // try{
            // if (Auth::guard('api')) {
                // auth('api')->logout();
                Auth::guard('api')->logout();
                return $this->responseWithSuccess([], 'Logout Success');
            // }
            // return $this->responseWithError([], 'No user found!');
        // }
        // catch(Throwable $e){
        //     return $this->responseWithError([], $e->getMessage());
        // }
        
    }


    public function index(){
        // dd('here');
        // $customerList = Customer::all();
        return $this->responseWithSuccess( CustomerResource::collection(Customer::all()), 'All Users');
    }

    public function single($id){
        // dd('here');
        // $customerList = Customer::all();
        return $this->responseWithSuccess( CustomerResource::make(Customer::find($id)), 'Single Customer');
    }
}
