<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard.index');
});
Route::get('/user', function () {
    return view('user.index');
});
Route::get('/destination', function () {
    return view('user.destination');
});
Route::get('/contact', function () {
    return view('user.contact');
});
Route::get('/pricing', function () {
    return view('user.pricing');
});
Route::get('/register', function () {
    return view('user.register');
});
Route::get('/Travel', function () {
    return view('user.Travel');
});

Route::get('login', [LoginController::class,'index'])->name('login');

Route::post("login",[LoginController::class,'verify']);



Route::get("", function () {
    
});
