<?php

use App\Http\Controllers\backend\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){
    $a = 10;
    $b =10;
    $c = ($a+ $b);
    echo $c;
});