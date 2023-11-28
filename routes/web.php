<?php
//admin
use App\Http\Controllers\adminViewController\LoginController;
use App\Http\Controllers\adminViewController\AdminDashboardController;
use \App\Http\Controllers\adminViewController\HomeBannerController;
use \App\Http\Controllers\adminViewController\CompanyServiceController;
use \App\Http\Controllers\adminViewController\PartnerController;
use \App\Http\Controllers\adminViewController\CompanyFactController;
use \App\Http\Controllers\adminViewController\companyProfileController;
use \App\Http\Controllers\adminViewController\TeamManageController;

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

    //partner manage
    Route::get('/partners_management', [PartnerController::class,'index'])->name('partners_management');
    Route::post('/manage_partner_status', [PartnerController::class,'managePartner'])->name('manage_partner_status');
    Route::get('/show_partner_logo', [PartnerController::class,'showPartnerDetails'])->name('show_partner_logo');
    Route::delete('/delete_partner_logo/{id}', [PartnerController::class,'deletePartnerLogo']);
    Route::post('/manage_status', [PartnerController::class,'managePartnerStatus'])->name('manage_status');

    //companyServiceFact
    Route::get('/company_service_fact', [CompanyFactController::class,'index'])->name('company_service_fact');
    Route::post('/company_service_fact_processor', [CompanyFactController::class,'manageServiceFact'])->name('company_service_fact_processor');
    Route::get('/show_company_service_fact', [CompanyFactController::class,'showCompanyServiceFact'])->name('show_company_service_fact');
    Route::delete('/delete_service_fact/{id}', [CompanyFactController::class,'deleteServiceFact']);
    Route::post('/service_fact_manage_status', [CompanyFactController::class,'manageServiceFactStatus'])->name('service_fact_manage_status');

    //Company profile manage
    Route::get('/company_profile', [companyProfileController::class,'index'])->name('company_profile');
    Route::post('/company_profile_manage', [companyProfileController::class,'companyProfileManage'])->name('company_profile_manage');
    Route::get('/company_profile_data_show', [companyProfileController::class,'showProfileDetails'])->name('company_profile_data_show');

    //Team members profile manage
    Route::get('/team_profile', [TeamManageController::class,'index'])->name('team_profile');
    Route::post('/team_members_profile_manage', [TeamManageController::class,'teamProfileManage'])->name('team_members_profile_manage');
    Route::get('/show_all_team_members', [TeamManageController::class,'showTeamMemberProfileDetails'])->name('show_all_team_members');
    Route::post('/manage_member_status', [TeamManageController::class,'mangeTeamProfileStatus'])->name('manage_member_status');
    Route::delete('/delete_member_profile/{id}', [TeamManageController::class,'deleteTeamMemberProfile']);

});




//landing view pages route
Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/service',[ServiceController::class,'index'])->name('service');
Route::get('/get-services/{offset}/{limit}',[ServiceController::class,'getServices']);
Route::get('/products',[ProductsController::class,'index'])->name('products');
Route::get('/productDetails',[productDetailsController::class,'index'])->name('productDetails');
Route::get('/single_service_details', [ServiceController::class,'singleServiceDetails'])->name('single_service_details');

