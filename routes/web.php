<?php
//admin
use App\Http\Controllers\adminViewController\LoginController;
use App\Http\Controllers\adminViewController\AdminDashboardController;
use \App\Http\Controllers\adminViewController\HomeBannerController;
use \App\Http\Controllers\adminViewController\CompanyServiceController;
//landing
use App\Http\Controllers\landingViewController\AboutController;
use App\Http\Controllers\landingViewController\ContactController;
use App\Http\Controllers\landingViewController\HomeController;
use App\Http\Controllers\landingViewController\ProductsController;
use App\Http\Controllers\landingViewController\ServiceController;
use App\Http\Controllers\landingViewController\productDetailsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('admin_view.pages.login');
});



//admin panel pages route
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/user_auth_data',[LoginController::class,'authData'])->name('login');
Route::get('/logout',[LoginController::class,'adminLogout'])->name('logout');


//these routes goes under middleware
Route::middleware(['admin_auth'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class,'index'])->name('dashboard');
    //admin banner
    Route::get('/home_banner', [HomeBannerController::class,'index'])->name('home_banner');
    Route::post('/home_banner_processor', [HomeBannerController::class,'bannerProcessing'])->name('home_banner_processor');
    Route::get('/show_banner_details', [HomeBannerController::class,'showBannerData'])->name('show_banner_details');
    Route::post('/manage_banner_status', [HomeBannerController::class,'mangeBannerStatus'])->name('manage_banner_status');
    Route::delete('/delete_banner/{id}', [HomeBannerController::class,'deleteBanner']);
    //admin service
    Route::get('/company_service', [CompanyServiceController::class,'index'])->name('company_service');
    Route::post('/company_service_processor', [CompanyServiceController::class,'addServiceDetails'])->name('company_service_processor');
    Route::get('/show_service_details', [CompanyServiceController::class,'showServiceDetails'])->name('show_service_details');
    Route::delete('/delete_service/{id}', [CompanyServiceController::class,'deleteService']);
    Route::post('/manage_service_status', [CompanyServiceController::class,'mangeServiceStatus'])->name('manage_service_status');

});




//landing view pages route
Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/service',[ServiceController::class,'index'])->name('service');
Route::get('/products',[ProductsController::class,'index'])->name('products');
Route::get('/productDetails',[productDetailsController::class,'index'])->name('productDetails');

