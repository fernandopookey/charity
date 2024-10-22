<?php

use App\Http\Controllers\Admin\CauseController;
use App\Http\Controllers\Admin\CauseImageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\DonateController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('user/home/index');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard2');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard2', function () {
//     return view('dashboard2');
// })->middleware(['auth', 'verified'])->name('dashboard2');

// Route::get('/test', function () {
//     return view('user.home.index2');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/donate/detail/{id}', [DonateController::class, 'show'])->name('user-cause-detail');

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth-google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth-google-callback');


// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ==========================================================================================================================================================
// ADMIN
// ==========================================================================================================================================================

Route::get('/donate', [DonateController::class, 'index'])->name('donate');


// Route::prefix('api')->middleware('api')->group(function () {
//     Route::post('/payments', [PaymentController::class, 'create']);
// });

// Route::middleware([])->group(function () {
//     Route::post('/payments', [PaymentController::class, 'create']);
// });

Route::middleware('api')->post('/payments/{id}', [PaymentController::class, 'create'])->name('api-payments');




// ADMIN
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/cause/{id}/image-upload', [CauseImageController::class, 'index'])->name('cause-image-upload');
    Route::put('/cause/{id}/process-image-upload', [CauseImageController::class, 'store'])->name('cause-image-upload-process');
    Route::get('/cause/{id}/delete-image-upload', [CauseImageController::class, 'destroy'])->name('cause-image-delete');

    Route::resource('cause', '\App\Http\Controllers\Admin\CauseController');
    Route::resource('slider', '\App\Http\Controllers\Admin\SliderController');
    Route::resource('help-reasons', '\App\Http\Controllers\Admin\HelpReasonController');
    Route::resource('home-video', '\App\Http\Controllers\Admin\HomeVideoController');
    Route::resource('transactions', '\App\Http\Controllers\Admin\TransactionController');
    Route::resource('users', '\App\Http\Controllers\Admin\UserController');
    Route::resource('media-socials', '\App\Http\Controllers\Admin\MediaSocialController');
    Route::resource('navbar-contents', '\App\Http\Controllers\Admin\NavbarContentController');
    Route::resource('footer-contents', '\App\Http\Controllers\Admin\FooterContentController');
});

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');





// Route::middleware('admin')->group(function () {

//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//     Route::resource('cause', '\App\Http\Controllers\Admin\CauseController');
//     Route::resource('slider', '\App\Http\Controllers\Admin\SliderController');
//     Route::resource('help-reasons', '\App\Http\Controllers\Admin\HelpReasonController');
//     Route::resource('home-video', '\App\Http\Controllers\Admin\HomeVideoController');
//     Route::resource('transactions', '\App\Http\Controllers\Admin\TransactionController');

//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


require __DIR__ . '/auth.php';
