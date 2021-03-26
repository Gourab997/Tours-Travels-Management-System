<?php
use App\Http\Controllers\employee\EmployeeController;
use App\Http\Controllers\employee\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\employee\PackageController;
use App\Http\Controllers\employee\BookingController;
use App\Http\Controllers\employee\TourguideController;
use App\Http\Controllers\employee\FeedbackController;
use App\Http\Controllers\account\AccountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\customer\UCustomerController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\tourguide\guideController;
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


Route::get('/', [LoginController::class,'first']); //Welcome Blade (redirect to login)

Route::get('/register',[UserController::class, 'register'])->name('reg.register');//Registration
Route::post('/auth/save',[UserController::class, 'save'])->name('auth.save'); //Registration Save
Route::get('/login',[LoginController::class, 'index'])->name('login.index');//Login
Route::post('/auth/check',[LoginController::class, 'verify'])->name('auth.check');//Login verification
Route::get('/logout',[LogoutController::class, 'logout'])->name('auth.logout');//Logout





//Varrification Start
Route::group(['middleware'=>'sess'],function ( ){

    //Employee Routing Start

    Route::get('/dashboard', [EmployeeController::class,'dashboard'])->name('dashboard.index');

    //Employee ->customer
    Route::get("dashboard/create",[CustomerController::class,'create']);
    Route::post("dashboard/create",[CustomerController::class,'store']);
    Route::get("dashboard/view",[CustomerController::class,'show']);
    Route::get('/searchcustomer',[CustomerController::class,'search']);
    Route::post("dashboard/view/{id}",[CustomerController::class,'confirmstatus']);
    Route::post('dashboard/import',[CustomerController::class,'import']);
    Route::get("dashboard/edituser/{id}",[CustomerController::class,'edit']);
    Route::post("dashboard/edituser/{id}",[CustomerController::class,'update']);
    Route::post("dashboard/deleteuser/{id}",[CustomerController::class,'destroy']);


    //Employee ->profile
    Route::get("dashboard/profile",[EmployeeController::class,'profile']);
    Route::get("dashboard/editprofile/{id}",[EmployeeController::class,'edit']);
    Route::post("dashboard/editprofile/{id}",[EmployeeController::class,'update']);


    //Employee ->package
    Route::get("dashboard/createpackage",[PackageController::class,'create']);
    Route::post("dashboard/createpackage",[PackageController::class,'store']);
    Route::get("dashboard/viewpackage",[PackageController::class,'show']);
    Route::get("dashboard/viewpackage/details/{p_id}",[PackageController::class,'packageshow']);
    Route::get("dashboard/viewpackage/download-pdf",[PackageController::class,'downloadPDF']);
    Route::get("dashboard/editpackage/{p_id}",[PackageController::class,'edit']);
    Route::post("dashboard/editpackage/{p_id}",[PackageController::class,'update']);
    Route::post("dashboard/deletepackage/{p_id}",[PackageController::class,'destroy']);


    //Employee ->booking
    Route::get("dashboard/booking",[BookingController::class,'index']);
    Route::get("dashboard/createbooking/{p_id}",[BookingController::class,'create']);
    Route::post("dashboard/createbooking/{p_id}",[BookingController::class,'store']);
    Route::get("dashboard/viewbooking",[BookingController::class,'show']);
    Route::post("dashboard/viewbooking/{b_id}",[BookingController::class,'storebooking']);
    Route::post("dashboard/addtourguide/{b_id}",[BookingController::class,'tourguide']);
    Route::post("dashboard/delete/{b_id}",[BookingController::class,'destroy']);
    Route::get('/searchbooking',[BookingController::class,'search']);
    Route::get("dashboard/viewbooking/export",[BookingController::class,'export']);

    //Employee -> tourguide
    Route::get("dashboard/createtourguide",[TourguideController::class,'create']);
    Route::post("dashboard/createtourguide",[TourguideController::class,'store']);

    Route::get("dashboard/viewtourguide",[TourguideController::class,'show']);
    Route::get('/searchtourguide',[TourguideController::class,'search']);
    Route::get("dashboard/edittourguide/{id}",[TourguideController::class,'edit']);
    Route::post("dashboard/edittourguide/{id}",[TourguideController::class,'update']);
    Route::post("dashboard/deletetourguide/{id}",[TourguideController::class,'destroy']);



    //Employee -> feedback
    Route::get("dashboard/viewfeedback",[FeedbackController::class,'index']);
    Route::post("dashboard/viewfeedback",[FeedbackController::class,'store']);

    //Employee Routing End

    //**************** */


    //Customer Routing Start
    Route::get('/customer/dashboard',[UCustomerController::class, 'userdashboard']);
    Route::get('/customer/settings',[UCustomerController::class,'usersettings']);
    Route::get('/customer/profile',[UCustomerController::class,'userprofile']);
    //Customer Routing END


    //**************** */


    //Admin Routing Start
    Route::get('/admin/dashboard',[AdminController::class, 'admindashboard'])->name('admin.dashboard');
    Route::get('/admin/settings',[AdminController::class,'adminsettings']);
    Route::get('/admin/profile',[AdminController::class,'adminprofile']);
    //Admin Routing END


    //**************** */


    //Account routing Start
    Route::get('/account/dashboard',[AccountController::class, 'accountdashboard'])->name('account.dashboard');


    //Accont ->profile
    Route::get("/account/dashboard/profile",[AccountController::class,'profile'])->name('account.profile');
    Route::get("/account/dashboard/editprofile/{id}",[AccountController::class,'edit'])->name('account.edit');
    Route::post("/account/dashboard/editprofile/{id}",[AccountController::class,'update'])->name('account.update');

    Route::get("/account/dashboard/Userlist",[AccountController::class,'ulist']);
    //Account routing END

    //**************** */


    //TourGuide routing Start
    Route::get('/guide/dashboard',[guideController::class, 'guidedashboard']);
    //TourGuide routing END

});
//Varrification END