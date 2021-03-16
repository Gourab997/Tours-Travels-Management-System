<?php
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TourguideController;
use App\Http\Controllers\FeedbackController;
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
Route::post("dashboard/view/{id}",[CustomerController::class,'confirmstatus']);
Route::post('dashboard/import',[CustomerController::class,'import']);
Route::get("dashboard/edituser/{id}",[CustomerController::class,'edit']);
Route::post("dashboard/edituser/{id}",[CustomerController::class,'update']);
Route::post("dashboard/deleteuser/{id}",[CustomerController::class,'destroy']);


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
Route::get("dashboard/editpackage/{p_id}",[PackageController::class,'edit']);
Route::post("dashboard/editpackage/{p_id}",[PackageController::class,'update']);
Route::post("dashboard/deletepackage/{p_id}",[PackageController::class,'destroy']);


//booking
Route::get("dashboard/booking",[BookingController::class,'index']);
Route::get("dashboard/createbooking/{p_id}",[BookingController::class,'create']);
Route::post("dashboard/createbooking/{p_id}",[BookingController::class,'store']);
Route::get("dashboard/viewbooking",[BookingController::class,'show']);
Route::post("dashboard/viewbooking/{b_id}",[BookingController::class,'storebooking']);
Route::post("dashboard/addtourguide/{b_id}",[BookingController::class,'tourguide']);
Route::post("dashboard/delete/{b_id}",[BookingController::class,'destroy']);
Route::get('/searchbooking',[BookingController::class,'search']);
Route::get("dashboard/viewbooking/export",[BookingController::class,'export']);

//tourguide
Route::get("dashboard/createtourguide",[TourguideController::class,'create']);
Route::post("dashboard/createtourguide",[TourguideController::class,'store']);

Route::get("dashboard/viewtourguide",[TourguideController::class,'show']);
Route::get('/searchtourguide',[TourguideController::class,'search']);
Route::get("dashboard/edittourguide/{id}",[TourguideController::class,'edit']);
Route::post("dashboard/edittourguide/{id}",[TourguideController::class,'update']);
Route::post("dashboard/deletetourguide/{id}",[TourguideController::class,'destroy']);



//feedback
Route::get("dashboard/viewfeedback",[FeedbackController::class,'index']);
Route::post("dashboard/viewfeedback",[FeedbackController::class,'store']);

Route::get("logout",[LogoutController::class,'index']);
});