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
use App\Http\Controllers\account\Blog\BlogCategoryController;
use App\Http\Controllers\account\Blog\BlogCommentController;
use App\Http\Controllers\account\Blog\BlogTagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\customer\UCustomerController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\tourguide\guideController;
use App\Http\Controllers\account\CouponController;
use App\Http\Controllers\account\Blog\BlogController;
use App\Http\Controllers\account\SettingsController;
use App\Http\Controllers\NotificationController;

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


Route::get('/', [UserController::class,'home'])->name('home'); //Welcome Blade (redirect to login)

Route::get('/register',[UserController::class, 'register'])->name('reg.register');//Registration
Route::post('/auth/save',[UserController::class, 'save'])->name('auth.save'); //Registration Save
Route::get('/login',[LoginController::class, 'index'])->name('login.index');//Login
Route::post('/auth/check',[LoginController::class, 'verify'])->name('auth.check');//Login verification
Route::get('/logout',[LogoutController::class, 'logout'])->name('auth.logout');//Logout



// Blog
Route::get('/blog',[UserController::class,'blog'])->name('blog');
Route::get('/blog-detail/{slug}',[UserController::class,'blogDetail'])->name('blog.detail');
Route::get('/blog/search',[UserController::class,'blogSearch'])->name('blog.search');
Route::post('/blog/filter',[UserController::class,'blogFilter'])->name('blog.filter');
Route::get('blog-cat/{slug}',[UserController::class,'blogByCategory'])->name('blog.category');
Route::get('blog-tag/{slug}',[UserController::class,'blogByTag'])->name('blog.tag');

// Post Comment 
Route::post('Blog/{slug}/comment',[BlogCommentController::class,'store'])->name('post-comment.store');
Route::get('/comment',[BlogCommentController::class,'index']);
Route::post('/comment/store',[BlogCommentController::class,'store']);
Route::get('/comment/edit',[BlogCommentController::class,'edit']);
Route::post('/comment/update',[BlogCommentController::class,'update']);
Route::post('/comment/delete',[BlogCommentController::class,'destroy']);

//Varrification Start

//**************** */
//**************** */
//**************** */


//Employee Routing Start
Route::group(['prefix'=>'/employee','middleware'=>['sess','employee']],function(){


        Route::get('/dashboard', [EmployeeController::class,'dashboard'])->name('dashboard.index');

        //Employee ->customer
        Route::get("/dashboard/create",[CustomerController::class,'create']);
        Route::post("/dashboard/create",[CustomerController::class,'store']);
        Route::get("dashboard/view",[CustomerController::class,'show']);
        Route::get('/searchcustomer',[CustomerController::class,'search']);
        Route::post("/dashboard/view/{id}",[CustomerController::class,'confirmstatus']);
        Route::post("/dashboard/import",[CustomerController::class,'import']);
        Route::get("/dashboard/edituser/{id}",[CustomerController::class,'edit']);
        Route::post("/dashboard/edituser/{id}",[CustomerController::class,'update']);
        Route::post("/dashboard/deleteuser/{id}",[CustomerController::class,'destroy']);
    
    
        //Employee ->profile
        Route::get("dashboard/profile",[EmployeeController::class,'profile']);
        Route::get("dashboard/editprofile/{id}",[EmployeeController::class,'edit']);
        Route::post("dashboard/editprofile/{id}",[EmployeeController::class,'update']);
    
    
        //Employee ->package
        Route::get("/dashboard/createpackage",[PackageController::class,'create'])->name('createpackage');
        Route::post("/dashboard/createpackage",[PackageController::class,'store'])->name('storepackage');
        Route::get("dashboard/viewpackage",[PackageController::class,'show'])->name('showpackage');
        Route::get("dashboard/viewpackage/details/{p_id}",[PackageController::class,'packageshow']);
        Route::get("dashboard/viewpackage/download-pdf",[PackageController::class,'downloadPDF']);
        Route::get("dashboard/editpackage/{p_id}",[PackageController::class,'edit'])->name('editpackage');
        Route::post("dashboard/editpackage/{p_id}",[PackageController::class,'update'])->name('updatepackage');
        Route::post("dashboard/deletepackage/{p_id}",[PackageController::class,'destroy'])->name('deletepackage');
    
    
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
    
        
    


});
//Employee Routing End


//**************** */
//**************** */
//**************** */


//TourGuide routing Start
Route::group(['prefix'=>'/guide','middleware'=>['sess','guide']],function(){

        
        Route::get('/guide/dashboard',[guideController::class, 'guidedashboard'])->name('guide.dashboard');
        

});
//TourGuide routing END


//**************** */
//**************** */
//**************** */


//Customer Routing Start
Route::group(['prefix'=>'/customer','middleware'=>['sess','customer']],function(){

        
        Route::get('/customer/dashboard',[UCustomerController::class, 'userdashboard'])->name('user');
        Route::get('/customer/settings',[UCustomerController::class,'usersettings']);
        Route::get('/customer/profile',[UCustomerController::class,'userprofile']);

        //User Blog comment
        Route::get('user-blog/comment',[UCustomerController::class, 'userComment'])->name('user.blog-comment.index');
        Route::delete('user-blog/comment/delete/{id}',[UCustomerController::class, 'userCommentDelete'])->name('user.blog-comment.delete');
        Route::get('user-blog/comment/edit/{id}',[UCustomerController::class, 'userCommentEdit'])->name('user.blog-comment.edit');
        Route::patch('user-blog/comment/udpate/{id}',[UCustomerController::class, 'userCommentUpdate'])->name('user.blog-comment.update');
        
});
//Customer Routing END


//**************** */
//**************** */
//**************** */


//Account routing Start
Route::group(['prefix'=>'/account','middleware'=>['sess','account']],function(){
    
    Route::get('/dashboard',[AccountController::class, 'accountdashboard'])->name('account.dashboard');


    //Accont ->profile
    Route::get("/dashboard/profile",[AccountController::class,'profile'])->name('account.profile');
    Route::get("/dashboard/editprofile/{id}",[AccountController::class,'edit'])->name('account.edit');
    Route::post("/dashboard/editprofile/{id}",[AccountController::class,'update'])->name('account.update');

    //Account ->User List
    Route::get("/dashboard/Userlist",[AccountController::class,'ulist']);

    //Account ->Coupon
    Route::post('/coupon-store',[CouponController::class,'couponStore'])->name('coupon-store');


    Route::get('/coupon',[CouponController::class,'index'])->name('coupon.index');
    Route::get('/coupon/create',[CouponController::class,'create'])->name('coupon.create');
    Route::post('/coupon/store',[CouponController::class,'store'])->name('coupon.store');
    Route::get('/coupon/edit/{id}',[CouponController::class,'edit'])->name('coupon.edit');
    Route::patch('/coupon/update/{id}',[CouponController::class,'update'])->name('coupon.update');
    Route::delete('/coupon/delete/{id}',[CouponController::class,'destroy'])->name('coupon.destroy');
    

     //Account -> BLOG category
     Route::get('/blog-category', [BlogCategoryController::class,'index'])->name('account.blog.cat');
     Route::get('/blog-category/create', [BlogCategoryController::class,'create'])->name('account.blog.create.cat');
     Route::post('/blog-category/store',[BlogCategoryController::class,'store'])->name('account.blog.store.cat');
        Route::get('/blog-category/edit/{id}',[BlogCategoryController::class,'edit'])->name('account.blog.edit.cat');
        Route::patch('/blog-category/update/{id}',[BlogCategoryController::class,'update'])->name('account.blog.update.cat');
        Route::delete('/blog-category/delete/{id}',[BlogCategoryController::class,'destroy'])->name('account.blog.delete.cat');
     
        //Account -> BLOG tag
     Route::get('/blog-tag', [BlogTagController::class,'index'])->name('account.blog.tag');
     Route::get('/blog-tag/create', [BlogTagController::class,'create'])->name('account.blog.create.tag');
     Route::post('/blog-tag/store',[BlogTagController::class,'store'])->name('account.blog.store.tag');
        Route::get('/blog-tag/edit/{id}',[BlogTagController::class,'edit'])->name('account.blog.edit.tag');
        Route::patch('/blog-tag/update/{id}',[BlogTagController::class,'update'])->name('account.blog.update.tag');
        Route::delete('/blog-tag/delete/{id}',[BlogTagController::class,'destroy'])->name('account.blog.delete.tag');
    
        //Account -> BLOG
     Route::get('/blog', [BlogController::class,'index'])->name('blog.index');
     Route::get('/blog/create', [BlogController::class,'create'])->name('account.create.blog');
     Route::post('/blog/store',[BlogController::class,'store'])->name('account.store.blog');
        Route::get('/blog/edit/{id}',[BlogController::class,'edit'])->name('account.edit.blog');
        Route::post('/blog/update/{id}',[BlogController::class,'update'])->name('account.update.blog');
        Route::delete('/blog/delete/{id}',[BlogController::class,'destroy'])->name('account.delete.blog');

        //Account -> Settings
    Route::get('settings',[SettingsController::class,'settings'])->name('settings');
    Route::post('setting/update',[SettingsController::class,'settingsUpdate'])->name('settings.update');

});
//Account routing END


//**************** */
//**************** */
//**************** */


//Admin Routing Start
Route::group(['prefix'=>'/admin','middleware'=>['sess','admin']],function(){
    
    Route::get('/dashboard',[AdminController::class, 'admindashboard'])->name('admin.dashboard');
    Route::get('/settings',[AdminController::class,'adminsettings']);
    Route::get('/profile',[AdminController::class,'adminprofile']);
    
});

//Admin Routing END


//**************** */

//Varrification END