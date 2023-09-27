<?php

use App\Http\Controllers\api\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('/registration', [CustomerController::class, 'registration']);
Route::post('/login', [CustomerController::class, 'login']);

Route::group(['middleware'=>'auth:api'], function(){
    Route::get('/logout', [CustomerController::class, 'logout']);
});



Route::get('/index',[CustomerController::class, 'index']);
Route::get('/single/{id}',[CustomerController::class, 'single']);

