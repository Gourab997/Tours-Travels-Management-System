<?php
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
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

Route::get('/', [LoginController::class,'index'])->name('login');

Route::get('login', [LoginController::class,'index'])->name('login');

Route::post("login",[LoginController::class,'verify']);


Route::group(['middleware'=>'sess'],function ( ){
Route::get('/dashboard', [EmployeeController::class,'dashboard']);
Route::get("dashboard/create",[CustomerController::class,'create']);
Route::post("dashboard/create",[CustomerController::class,'store']);
Route::get("dashboard/view",[CustomerController::class,'show']);
Route::get("dashboard/profile",[EmployeeController::class,'profile']);
Route::get("dashboard/editprofile/{id}",[EmployeeController::class,'edit']);
Route::post("dashboard/editprofile/{id}",[EmployeeController::class,'update']);
});