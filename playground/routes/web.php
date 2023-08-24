<?php

use App\Http\Controllers\backend\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\HomeController;

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

Route::get('/', function () {
    return view('welcome')->name('welcome');
});

Route::get('');
//login

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');


Route::get('/registration', [CustomerController::class, 'create'])->name('registration');

Route::resource('customer', CustomerController::class);


Route::get('/',[HomeController::class, 'layout']);