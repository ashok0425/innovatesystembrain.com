<?php

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FrontendsettingController;
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


Route::get('extrasetting','App\Http\Controllers\Setting2Controller@index')->name('extrasetting');//front end setting
Route::post('extrasetting/update','App\Http\Controllers\Setting2Controller@update')->name('update-extrasetting');//update front end setting


Route::get('question-answer','App\Http\Controllers\QuestionController@show')->name('question');//Q&A page


Route::get('question-answer/create','App\Http\Controllers\QuestionController@create')->name('addquestion');//add Q&A page
Route::post('question-answer/store','App\Http\Controllers\QuestionController@store')->name('storequestion');//store Q&A
Route::get('question-answer/delete/{id}','App\Http\Controllers\QuestionController@destroy')->name('questiondelete');//delete Q&A
Route::get('question-answer/edit/{id}','App\Http\Controllers\QuestionController@edit')->name('questionedit');
Route::post('question-answer/update','App\Http\Controllers\QuestionController@update')->name('questionupdate');//







Route::get('carrer','App\Http\Controllers\QAController@show')->name('Q&A');//Q&A page


Route::get('addcarrer','App\Http\Controllers\QAController@create')->name('addQ&A');//add Q&A page
Route::post('storcarrer','App\Http\Controllers\QAController@store')->name('storecarrer');//store Q&A
Route::get('carrerdelete/{id}','App\Http\Controllers\QAController@destroy')->name('Q&Adelete');//delete Q&A
Route::get('editcarrer/{id}','App\Http\Controllers\QAController@edit')->name('Q&Aedit');
Route::post('updatecarrer/','App\Http\Controllers\QAController@update')->name('Q&Aupdate');//

Route::get('admin/branch','App\Http\Controllers\BranchController@index')->name('branch');//Q&A page
Route::get('admin/add-branch','App\Http\Controllers\BranchController@create')->name('addbranch');//add Q&A page
Route::post('admin/storebranch','App\Http\Controllers\BranchController@store')->name('storebranch');//store Q&A
Route::get('admin/branchdelete/{id}','App\Http\Controllers\BranchController@destroy')->name('branchdelete');//delete Q&A
Route::get('admin/editbranch/{id}','App\Http\Controllers\BranchController@edit')->name('editbranch');//delete Q&A
Route::post('admin/updatebranch','App\Http\Controllers\BranchController@update')->name('updatebranch');//delete Q&A

// contact page
Route::get('contactlist', function () {//About page
    $user=contactform::all();

    return view('admin.contact')->with('arr',$user);
})->name('admincontact');

// contact page
Route::get('candidatelist', function () {//About page
    $user=vacancy::orderBy('id','desc')->get();

    return view('admin.candidate')->with('arr',$user);
})->name('admincandidate');
// contact page
Route::get('hirelist', function () {//About page
    $user=Hire::orderBy('id','desc')->get();

    return view('admin.hire')->with('arr',$user);
})->name('adminhire');
// contact page
Route::get('subscriberlist', function () {//About page
    $user=Subscriber::all();

    return view('admin.subscriber')->with('arr',$user);
})->name('subscriberlist');

Route::get('admin/candidatedelete/{id}','App\Http\Controllers\VacancyController@destroy')->name('candidatedelete');//delete candidate
Route::get('admin/subscriberdelete/{id}','App\Http\Controllers\SubscriberController@destroy')->name('subscriberdelete');//delete subscriber
Route::get('admin/contactdelete/{id}','App\Http\Controllers\ContactformController@destroy')->name('contactdelete');//delete subscriber
});
// -------------------Frontend setup--------------------------------------------
Route::get('/', function () {//index page
    return view('frontend.home.index');
})->name('/');

Route::get('/about', function () {//About page
    return view('frontend.about');
})->name('about');

Route::get('/blogs/list', function () {//Blog page
    return view('frontend.blog');
})->name('frontend.blog');

Route::get('/portfolio', function () {//Portfolio page
    $portfolio=DB::table('projects')->get();
    return view('frontend.portfolio')->with('portfolio',$portfolio);
})->name('frontend.portfolio');

Route::get('/service', function () {//service page
    $service=DB::table('services')->orderBy('id','desc')->get();

    return view('frontend.service')->with('product',$service);
})->name('frontend.service');

Route::get('/career', function () {//carrer page

    return view('frontend.carrer');
})->name('career');

Route::get('/career/detail/{id}', function ($id) {//carrer detail page
$detail=DB::table('q_a_s')->where('id',$id)->first();
    return view('frontend.careerdetail')->with('detail',$detail);
})->name('career_detail');

Route::get('/blog/detail/{id}/', function ($id) {//blog detail page
    $detail=DB::table('blogs')->where('id',$id)->first();
        return view('frontend.blogdetail')->with('detail',$detail);
    })->name('blog_detail');


    Route::get('/portfolio/detail/{id}', function ($id) {//carrer detail page
        $detail=DB::table('projects')->where('id',$id)->first();
            return view('frontend.portfoliodetail')->with('portfolio',$detail);
        })->name('portfolio-detail');

Route::get('/contact', function () {//contact page

    return view('frontend.contact');
})->name('frontend.contact');

Route::get('/faq', function () {//contact page

    return view('frontend.faq');
})->name('faq');

Route::get('/term-condition', function () {//contact page

    return view('frontend.term');
})->name('term');

Route::get('/policy', function () {//contact page

    return view('frontend.policy');
})->name('policy');
Route::get('/hire-us', function () {//contact page

    return view('frontend.hire');
})->name('hire');



Route::post('hire-store','App\Http\Controllers\HireController@store')->name('hirestore');//contact-form save to database
Route::post('contact-form-store','App\Http\Controllers\ContactformController@store')->name('contactformstore');//contact-form save to database

Route::post('newsletter','App\Http\Controllers\SubscriberController@store')->name('newsletterstore');//Newstetter save to database


Route::post('apply-for-post','App\Http\Controllers\VacancyController@store')->name('candidatestore');//candidate save to database
