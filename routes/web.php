<?php
//admin
use App\Http\Controllers\adminViewController\LoginController;
use App\Http\Controllers\adminViewController\AdminDashboardController;
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



Route::middleware(['admin_auth'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class,'index'])->name('dashboard');
});




//landing view pages route
Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/service',[ServiceController::class,'index'])->name('service');
Route::get('/products',[ProductsController::class,'index'])->name('products');
Route::get('/productDetails',[productDetailsController::class,'index'])->name('productDetails');

