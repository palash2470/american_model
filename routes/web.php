<?php

use Illuminate\Support\Facades\Route;
//Start frontend
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthenticationController as UserAuthController;
use App\Http\Controllers\DashboardController as UserDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\PlanController as UserPlanController;
use App\Http\Controllers\SearchController;
Use App\Http\Controllers\BlogController;
use App\Http\Controllers\PaymentController;
//end frontend

use App\Http\Controllers\Admin\Auth\AuthenticationController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Colour\ColourController;
use App\Http\Controllers\Admin\Size\SizeController;
use App\Http\Controllers\Admin\Ethnicity\EthnicityController;
use App\Http\Controllers\Admin\Plan\PlanController;
use App\Http\Controllers\Admin\Plan\PlanGroupController;
use App\Http\Controllers\Admin\Plan\PlanAttributeController;
use App\Http\Controllers\Admin\Setting\SettingController;

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


//Start frontend
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/login',[UserAuthController::class,'showLogin'])->name('login');
Route::post('/login',[UserAuthController::class,'doLogin'])->name('user.login');
Route::get('/signup',[UserAuthController::class,'registration'])->name('signup');
Route::post('/signup',[UserAuthController::class,'doRegistration'])->name('user.signup');
Route::get('/account/verify/{token}', [UserAuthController::class, 'verifyAccount'])->name('user.verify');
Route::get('/verify/email',[UserAuthController::class,'showVerifyEmail'])->name('email.verify');
Route::get('/resend/verify-email/{slug}',[UserAuthController::class,'resendVerifyEmail'])->name('resend.email.verify');
//password
Route::get('/forget-password', [UserAuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('/forget-password', [UserAuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [UserAuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [UserAuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');
//Ajax state and city list
Route::post('/fetch-states', [DropdownController::class, 'fetchState']);
//Route::post('/fetch-cities', [DropdownController::class, 'fetchCity']);

Route::get('/subscription-plan',[UserPlanController::class,'showSubscriptionPlan'])->name('user.subscription.plan');
//Seaarch section
Route::get('/filter/{category}',[SearchController::class,'search'])->name('user.search');

Route::get('/profile/{category}/{slug}',[ProfileController::class,'viewProfile'])->name('user.view.profile');
//Blog 
Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/blog/details',[BlogController::class,'details'])->name('blog.details');

Route::get('/about-us',[HomeController::class,'aboutUs'])->name('about_us');
Route::middleware(['auth', 'is_verify_email'])->group(function(){
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard')->middleware('has_profile');
    Route::get('/user/register-basicinfo',[ProfileController::class,'createBasicInformation'])->name('user.basic.information.create');
    Route::post('/user/register-basicinfo',[ProfileController::class,'storeBasicInformation'])->name('user.basic.information.store');
    Route::get('/user/register-details-info',[ProfileController::class,'createDetailsInformation'])->name('user.details.information.create');
    Route::post('/user/register-details-info',[ProfileController::class,'storeDetailsInformation'])->name('user.details.information.store');

    Route::get('/register-plan',[UserPlanController::class,'showRegPlan'])->name('user.registration.plan');
    Route::post('/register-plan',[ProfileController::class,'storeUserPlan'])->name('user.store.plan');

    //Myaccount Section
    Route::get('/myaccount/account',[ProfileController::class,'myAccount'])->name('user.account')->middleware('has_profile');
    Route::post('/myaccount/account',[ProfileController::class,'updateMyAccount'])->name('user.account.update');
    Route::get('/myaccount/change-password',[ProfileController::class,'changePassword'])->name('user.change_password');
    Route::post('/myaccount/change-password',[ProfileController::class,'changePasswordUpdate'])->name('user.change_password.update');
    Route::get('/myaccount/display-options',[ProfileController::class,'displayOptions'])->name('user.display_option');
    Route::post('/myaccount/display-options',[ProfileController::class,'displayOptionsUpdate'])->name('user.display_option.update');
    Route::get('/myaccount/my-membership',[ProfileController::class,'myMembership'])->name('user.my_membership');
    Route::get('/myaccount/my-billing',[ProfileController::class,'myBilling'])->name('user.my_billing');
    //end Myaccount Section

    Route::get('/my-profile/edit',[ProfileController::class,'myProfileEdit'])->name('user.profile_edit')->middleware('has_profile');
    Route::post('/my-profile/edit',[ProfileController::class,'myProfileUpdate'])->name('user.profile.update');
    Route::post('/image-upload',[ProfileController::class,'imageUpload'])->name('user.image.upload');
    Route::post('/ajax/image-change',[ProfileController::class,'ajaxImageChange'])->name('ajax.image_change');
    Route::post('/delete-img',[ProfileController::class,'ajaxDeleteImg'])->name('user.delete_img');

    //favourite
    Route::post('/favourite',[ProfileController::class,'ajaxFavourite'])->name('user.favourite');    
    //follow
    Route::post('/follow',[ProfileController::class,'ajaxFollow'])->name('user.follow');
    //Payment
    Route::get('/payment/{slug}',[PaymentController::class,'payment'])->name('user.payment');
    Route::get('/payment-process',[PaymentController::class,'paymentProcess'])->name('payment.process');
    //Paypal
    Route::get('success-transaction', [PaymentController::class, 'successTransaction'])->name('successTransaction');
    Route::get('cancel-transaction', [PaymentController::class, 'cancelTransaction'])->name('cancelTransaction');
    //Route::get()
    Route::get('/logout',[UserAuthController::class,'logout'])->name('logout');
});

//End frontend
//Admin 
Route::get('admin/login', [AuthenticationController::class,'ShowLogin'])->name('admin.login');
Route::post('admin/login', [AuthenticationController::class,'DoLogin'])->name('admin.logins');
Route::group(['middleware'=>'is_admin','prefix'=>'admin'],function(){
    Route::get('/dashboard',[DashboardController::class,'Index'])->name('admin');
    Route::get('/logout', [DashboardController::class,'logout'])->name('admin.logout');
    Route::get('/user',[UserController::class,'Index'])->name('admin.user');
    //Master section  
    //category
    Route::group(['prefix'=>'category'], function(){
        Route::get('/',[CategoryController::class,'index'])->name('admin.category.index');
        //Route::get('/add',[CategoryCOntroller::class,'create'])->name('admin.category.create');
        Route::post('/add',[CategoryController::class,'store'])->name('admin.category.store');
        Route::get('/edit/{slug}',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::post('/edit',[CategoryController::class,'update'])->name('admin.category.update');
        Route::get('/delete',[CategoryController::class,'delete'])->name('admin.category.delete');
    }); 

    //Colour
    Route::group(['prefix'=>'colour'], function(){
        Route::get('/',[ColourController::class,'index'])->name('admin.colour.index');
        Route::post('/add',[ColourController::class,'store'])->name('admin.colour.store');
        Route::get('/edit/{slug}',[ColourController::class,'edit'])->name('admin.colour.edit');
        Route::post('/edit',[ColourController::class,'update'])->name('admin.colour.update');
        Route::get('/delete',[ColourController::class,'delete'])->name('admin.colour.delete');
    }); 
    
     //Size
     Route::group(['prefix'=>'size'], function(){
        Route::get('/',[SizeController::class,'index'])->name('admin.size.index');
        Route::post('/add',[SizeController::class,'store'])->name('admin.size.store');
        Route::get('/edit/{slug}',[SizeController::class,'edit'])->name('admin.size.edit');
        Route::post('/edit',[SizeController::class,'update'])->name('admin.size.update');
        Route::get('/delete',[SizeController::class,'delete'])->name('admin.size.delete');
    });

    //Ethnicity
    Route::group(['prefix'=>'ethnicity'], function(){
        Route::get('/',[EthnicityController::class,'index'])->name('admin.ethnicity.index');
        //Route::get('/add',[CategoryCOntroller::class,'create'])->name('admin.category.create');
        Route::post('/add',[EthnicityController::class,'store'])->name('admin.ethnicity.store');
        Route::get('/edit/{slug}',[EthnicityController::class,'edit'])->name('admin.ethnicity.edit');
        Route::post('/edit',[EthnicityController::class,'update'])->name('admin.ethnicity.update');
        Route::get('/delete',[EthnicityController::class,'delete'])->name('admin.ethnicity.delete');
    }); 

    //Plan Group
    Route::group(['prefix'=>'plan-group'], function(){
        Route::get('/',[PlanGroupController::class,'index'])->name('admin.plan_group.index');
        Route::get('/add',[PlanGroupController::class,'create'])->name('admin.plan_group.create');
        Route::post('/add',[PlanGroupController::class,'store'])->name('admin.plan_group.store');
        Route::get('/edit/{slug}',[PlanGroupController::class,'edit'])->name('admin.plan_group.edit');
        Route::post('/edit',[PlanGroupController::class,'update'])->name('admin.plan_group.update');
        Route::get('/delete',[PlanGroupController::class,'delete'])->name('admin.plan_group.delete');
    }); 

    //Plan Attribute
    Route::group(['prefix'=>'plan-attribute'], function(){
        Route::get('/',[PlanAttributeController::class,'index'])->name('admin.plan_attribute.index');
        //Route::get('/add',[CategoryCOntroller::class,'create'])->name('admin.category.create');
        Route::post('/add',[PlanAttributeController::class,'store'])->name('admin.plan_attribute.store');
        Route::get('/edit/{slug}',[PlanAttributeController::class,'edit'])->name('admin.plan_attribute.edit');
        Route::post('/edit',[PlanAttributeController::class,'update'])->name('admin.plan_attribute.update');
        Route::get('/delete',[PlanAttributeController::class,'delete'])->name('admin.plan_attribute.delete');
    }); 

     //Member Plan
     Route::group(['prefix'=>'plan'],function(){
        Route::get('/',[PlanController::class,'index'])->name('admin.plan');
        Route::get('/add',[PlanController::class,'create'])->name('admin.create.plan');
        Route::post('/add',[PlanController::class,'store'])->name('admin.add.plan');
        Route::get('/edit/{slug}',[PlanController::class,'edit'])->name('admin.edit.plan');
        Route::post('/edit',[PlanController::class,'update'])->name('admin.update.plan');
        Route::get('/plan-attribute',[PlanController::class,'getPlanAttrBygroup'])->name('admin.ajax.attr');
        //Route::get('/delete/{slug}',[PlanController::class,'destroy'])->name('admin.delete.plan');
    }); 

    //Home Page Banner 
    Route::group(['prefix'=>'home-banner'], function(){
        Route::get('/',[SettingController::class,'bannerIndex'])->name('admin.home_banner.index');
        //Route::get('/add',[CategoryCOntroller::class,'create'])->name('admin.category.create');
        Route::post('/add',[SettingController::class,'bannerStore'])->name('admin.home_banner.store');
        Route::get('/edit/{slug}',[SettingController::class,'bannerEdit'])->name('admin.home_banner.edit');
        Route::post('/edit',[SettingController::class,'bannerUpdate'])->name('admin.home_banner.update');
        Route::get('/delete',[SettingController::class,'bannerDelete'])->name('admin.home_banner.delete');
    }); 
    //End Master secton
});
