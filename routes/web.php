<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthenticationController as UserAuthController;
use App\Http\Controllers\DashboardController as UserDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\PlanController as UserPlanController;
use App\Http\Controllers\SearchController;
Use App\Http\Controllers\BlogController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\GalleryController as GalleryImageController;

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
use App\Http\Controllers\Admin\Advertisement\AdvertisementController;
use App\Http\Controllers\Admin\Gallery\GalleryAlbumController;
use App\Http\Controllers\Admin\Gallery\GalleryController;
use App\Http\Controllers\Admin\Weight\WeightController;
use App\Http\Controllers\Admin\Poll\PollController;


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
Route::post('/fetch-cities', [DropdownController::class, 'fetchCity']);
Route::post('/fetch-city-autocomplete', [DropdownController::class, 'autoCompleteCity']);

Route::get('/subscription-plan',[UserPlanController::class,'showSubscriptionPlan'])->name('user.subscription.plan');
//Seaarch section
Route::get('/filter/{category}',[SearchController::class,'search'])->name('user.search');
Route::get('/search-by-talent',[SearchController::class,'searchByTalent'])->name('search.talent');
Route::get('/profile/{category}/{slug}',[ProfileController::class,'viewProfile'])->name('user.view.profile');
//Blog
Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/blog/details',[BlogController::class,'details'])->name('blog.details');

//Book user
Route::post('/book-now',[BookController::class,'storeBook'])->name('book_now');

Route::get('/book/calendar',[BookController::class,'calendarBookingList'])->name('user.calendar.book');

Route::get('/about-us',[HomeController::class,'aboutUs'])->name('about_us');
Route::post('/comments-contact-from',[CommentController::class,'storeCommentContactFrm'])->name('profile.contact_form.save');

// Job
Route::get('/job-search', [JobController::class, 'job'])->name('job');
Route::get('/job-search/{slug}', [JobController::class, 'jobSearch']);
Route::post('/job-search-post', [JobController::class, 'jobSearchPost'])->name('job.search');
Route::get('/job/details/{slug}',[JobController::class, 'jobDetails']);
//newsletter
Route::post('/store-newsletter',[HomeController::class,'storeNewsletter']);

//gallery images
Route::get('/gallery',[GalleryImageController::class,'index'])->name('gallery.album.list');
Route::get('/gallery/showcase/{id}',[GalleryImageController::class,'getImageByAlbum'])->name('gallery.image.list');

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
    Route::get('/myaccount/booking-list',[ProfileController::class,'booking'])->name('user.booking');

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
    //stripe
    Route::post('stripe', [PaymentController::class, 'stripePost'])->name('stripe.payment');

    Route::get('/payment-success',[PaymentController::class,'successPayment'])->name('payment.success');
    //Route::get()
    Route::get('/logout',[UserAuthController::class,'logout'])->name('logout');

    //Profile Comments
    Route::post('/profile-comments',[CommentController::class,'storeProfileComment'])->name('profile.comment.store');
    Route::post('/profile-comments-like-store',[CommentController::class,'storeProfileCommentLike'])->name('profile.comment.like.store');

    //photo comments
    Route::post('/photo-comments',[CommentController::class,'storePhotoComment'])->name('photo.comment.store');
    //user photo like
    Route::post('/photo/like',[ProfileController::class,'ajaxLikePhoto'])->name('user.like.photo');
    Route::post('/profile/send-mail',[ProfileController::class,'sendMailToModels'])->name('profile.send.mail');

    // Job
    Route::get('job-apply/{slug}', [JobController::class, 'jobApply']);
    Route::post('job-apply/', [JobController::class, 'jobApplyStore'])->name('job.apply.store');
});

Route::middleware(['auth', 'is_verify_email','is_casting_director'])->group(function () {
    // Job
    Route::get('/job', [JobController::class, "jobs"] )->name('jobs');
    Route::get('/job-applied/{slug}', [JobController::class, "jobApplied"] );
    Route::get('/post-job', [JobController::class, "postJob"] )->name('job.post');
    Route::post('/post-job', [JobController::class, "postJobStore"] )->name('job.post.store');
    Route::get('/post-job-update/{slug}', [JobController::class, "postJobUpdate"] )->name('job.post.update');
    Route::post('/post-job-update', [JobController::class, "postJobUpdateStore"] )->name('job.post.update.store');
});

//End frontend
//Admin
Route::get('admin/login', [AuthenticationController::class,'ShowLogin'])->name('admin.login');
Route::post('admin/login', [AuthenticationController::class,'DoLogin'])->name('admin.logins');
Route::group(['middleware'=>'is_admin','prefix'=>'admin'],function(){
    Route::get('/dashboard',[DashboardController::class,'Index'])->name('admin');
    Route::get('/logout', [DashboardController::class,'logout'])->name('admin.logout');
    Route::group(['prefix'=>'user'], function(){
        Route::get('/',[UserController::class,'Index'])->name('admin.user');
        Route::get('/edit/{slug}',[UserController::class,'edit'])->name('admin.user.edit');
        Route::post('/edit',[UserController::class,'update'])->name('admin.user.update');
        Route::get('/delete/{id}',[UserController::class,'delete'])->name('admin.user.delete');
        Route::get('/ban/{id}',[UserController::class,'ban'])->name('admin.user.ban');
        Route::post('/',[UserController::class,'bulkActionAjax'])->name('admin.user.bulk');
    });
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
        Route::get('/delete/{id}',[ColourController::class,'delete'])->name('admin.colour.delete');
    });

     //Size
     Route::group(['prefix'=>'size'], function(){
        Route::get('/',[SizeController::class,'index'])->name('admin.size.index');
        Route::post('/add',[SizeController::class,'store'])->name('admin.size.store');
        Route::get('/edit/{slug}',[SizeController::class,'edit'])->name('admin.size.edit');
        Route::post('/edit',[SizeController::class,'update'])->name('admin.size.update');
        Route::get('/delete/{id}',[SizeController::class,'delete'])->name('admin.size.delete');
    });
    //Weight
    Route::group(['prefix'=>'weight'], function(){
        Route::get('/',[WeightController::class,'index'])->name('admin.weight.index');
        //Route::get('/add',[CategoryCOntroller::class,'create'])->name('admin.category.create');
        Route::post('/add',[WeightController::class,'store'])->name('admin.weight.store');
        Route::get('/edit/{slug}',[WeightController::class,'edit'])->name('admin.weight.edit');
        Route::post('/edit',[WeightController::class,'update'])->name('admin.weight.update');
        Route::get('/delete/{id}',[WeightController::class,'delete'])->name('admin.weight.delete');
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

    //Settings
    Route::group(['prefix'=>'setting'],function(){
        Route::get('/edit/{slug}',[SettingController::class,'edit'])->name('admin.setting.edit');
        Route::post('/edit',[SettingController::class,'update'])->name('admin.setting.update');
        //Advertisement
        Route::group(['prefix'=>'advertisement'], function(){
            Route::get('/',[AdvertisementController::class,'index'])->name('admin.advertisement.index');
            //Route::get('/add',[CategoryCOntroller::class,'create'])->name('admin.category.create');
            Route::post('/add',[AdvertisementController::class,'store'])->name('admin.advertisement.store');
            Route::get('/edit/{slug}',[AdvertisementController::class,'edit'])->name('admin.advertisement.edit');
            Route::post('/edit',[AdvertisementController::class,'update'])->name('admin.advertisement.update');
            Route::get('/delete/{id}',[AdvertisementController::class,'destroy'])->name('admin.advertisement.delete');
        });
        //poll
        Route::group(['prefix'=>'poll'], function(){
            Route::get('/',[PollController::class,'index'])->name('admin.poll.index');
            Route::get('/add',[PollController::class,'create'])->name('admin.poll.create');
            Route::post('/add',[PollController::class,'store'])->name('admin.poll.store');
            Route::get('/edit/{slug}',[PollController::class,'edit'])->name('admin.poll.edit');
            Route::post('/edit',[PollController::class,'update'])->name('admin.poll.update');
            Route::get('/delete/{id}',[PollController::class,'destroy'])->name('admin.poll.delete');
        });
    });

     //Home Page Banner
     Route::group(['prefix'=>'gallery'], function(){
        Route::group(['prefix'=>'image'], function(){
            Route::get('/',[GalleryController::class,'index'])->name('admin.gallery.index');
            //Route::get('/add',[CategoryCOntroller::class,'create'])->name('admin.category.create');
            Route::post('/add',[GalleryController::class,'store'])->name('admin.gallery.store');
            Route::get('/edit/{slug}',[GalleryController::class,'edit'])->name('admin.gallery.edit');
            Route::post('/edit',[GalleryController::class,'update'])->name('admin.gallery.update');
            Route::get('/delete/{id}',[GalleryController::class,'delete'])->name('admin.gallery.delete');
        });
        Route::group(['prefix'=>'album'], function(){
            Route::get('/',[GalleryAlbumController::class,'index'])->name('admin.gallery.album.index');
            //Route::get('/add',[CategoryCOntroller::class,'create'])->name('admin.category.create');
            Route::post('/add',[GalleryAlbumController::class,'store'])->name('admin.gallery.album.store');
            Route::get('/edit/{slug}',[GalleryAlbumController::class,'edit'])->name('admin.gallery.album.edit');
            Route::post('/edit',[GalleryAlbumController::class,'update'])->name('admin.gallery.album.update');
            Route::get('/delete/{id}',[GalleryAlbumController::class,'delete'])->name('admin.gallery.album.delete');
        });
    });


    //End Master secton
});
