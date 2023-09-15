<?php

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FrontendsettingController;
use App\Http\Controllers\HomeController;
use App\Models\Branch;
use Illuminate\Support\Facades\Route;
use App\Models\contactform;
use App\Models\Subscriber;
use App\Models\vacancy;
use App\Models\Hire;

use Illuminate\Support\Facades\DB;



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
// ---------admin setup------------------------------


Route::get('admin/login', function () {//index page

    return view('admin.login');
});
Route::middleware(['auth:sanctum'])->prefix('admin')->name('admin.')->group(function(){
    Route::resource('services',ServiceController::class);
    Route::resource('banners',BannerController::class);
    Route::resource('teams',TeamController::class);
    Route::resource('blogs',BlogController::class);
    Route::resource('testimonials',TestimonialController::class);
    Route::resource('portfolios',PortfolioController::class);
    Route::resource('faqs',FaqController::class);
    Route::resource('branches',BranchController::class);
    Route::get('contact',[FrontendsettingController::class,'contactList'])->name('contactlist');//front end setting

    Route::get('frontend-setting',[FrontendsettingController::class,'index'])->name('frontend-setting');//front end setting
    Route::post('update-frontend',[FrontendsettingController::class,'update'])->name('update-frontend');//update front end setting

});

Route::middleware(['auth:sanctum'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');//index/dashboard adter login

Route::middleware(['auth:sanctum'])->group(function(){


Route::get('userlogout','App\Http\Controllers\admin_logout@logout')->name('userlogout'); //logout
Route::get('change-password','App\Http\Controllers\admin_logout@changepass')->name('change.password'); //change password
Route::post('update-password','App\Http\Controllers\admin_logout@updatepass')->name('updatepassword');//update password
Route::get('profile-update','App\Http\Controllers\admin_logout@updateprofile')->name('profile.update');//profile update
Route::post('save-profile','App\Http\Controllers\admin_logout@saveprofile')->name('saveprofile');//save profile

});
// -------------------Frontend setup--------------------------------------------
Route::get('/',[HomeController::class,'home'])->name('/');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/services',[HomeController::class,'service'])->name('services');
Route::get('/teams',[HomeController::class,'team'])->name('teams');
Route::get('/portfolios',[HomeController::class,'portfolio'])->name('portfolios');
Route::get('/blogs',[HomeController::class,'blog'])->name('blogs');
Route::get('/service/{slug}',[HomeController::class,'serviceDetail'])->name('service.detail');
Route::get('/portfolio/{slug}',[HomeController::class,'portfolioDetail'])->name('portfolio.detail');

Route::post('/contact',[HomeController::class,'contactStore']);







