<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function responseWithSuccess($data, $msg){
        return response()->json([
            'success' => true,
            'status' => 200,
            'data'  => $data,
            'message' => $msg
        ]);
    }

    public function responseWithError($data, $msg){
        return response()->json([
            'success' => false,
            'status' => 401,
            'data'  => $data,
            'message' => $msg
        ]);
    }
}
