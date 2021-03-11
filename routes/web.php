<?php
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TourguideController;
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

Route::get('/', [LoginController::class,'index'])->name('login');

Route::get('login', [LoginController::class,'index'])->name('login');

Route::post("login",[LoginController::class,'verify']);


Route::group(['middleware'=>'sess'],function ( ){
Route::get('/dashboard', [EmployeeController::class,'dashboard']);

//customer
Route::get("dashboard/create",[CustomerController::class,'create']);
Route::post("dashboard/create",[CustomerController::class,'store']);
Route::get("dashboard/view",[CustomerController::class,'show']);
Route::get('/searchcustomer',[CustomerController::class,'search']);

//profile
Route::get("dashboard/profile",[EmployeeController::class,'profile']);
Route::get("dashboard/editprofile/{id}",[EmployeeController::class,'edit']);
Route::post("dashboard/editprofile/{id}",[EmployeeController::class,'update']);


//package
Route::get("dashboard/createpackage",[PackageController::class,'create']);
Route::post("dashboard/createpackage",[PackageController::class,'store']);
Route::get("dashboard/viewpackage",[PackageController::class,'show']);
Route::get("dashboard/viewpackage/details/{p_id}",[PackageController::class,'packageshow']);
Route::get("dashboard/viewpackage/download-pdf",[PackageController::class,'downloadPDF']);


//booking
Route::get("dashboard/booking",[BookingController::class,'index']);
Route::get("dashboard/createbooking/{p_id}",[BookingController::class,'create']);
Route::post("dashboard/createbooking/{p_id}",[BookingController::class,'store']);
Route::get("dashboard/viewbooking",[BookingController::class,'show']);
Route::post("dashboard/viewbooking/{b_id}",[BookingController::class,'storebooking']);
Route::post("dashboard/addtourguide/{b_id}",[BookingController::class,'tourguide']);
Route::post("dashboard/delete/{b_id}",[BookingController::class,'destroy']);
Route::get('/searchbooking',[BookingController::class,'search']);



Route::get("logout",[LogoutController::class,'index']);
});