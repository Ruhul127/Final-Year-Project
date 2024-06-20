<?php

use App\Http\Controllers\{AdminBookingController, AdminController, AdminTrainerController, AdminUsersController, SiteController, TrainerController, UserController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/', [SiteController::class, 'index'])->name('home-main');
Route::get('/contact-us', [SiteController::class, 'contactUs'])->name('contact-us');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/my-account', [SiteController::class, 'account'])->name('my-account');
Route::post('/updateProfile/{id}', [SiteController::class, 'updateProfile'])->name('updateProfile');

// trainer skills
Route::get('/trainer-skills', [TrainerController::class, 'skillCreate'])->name('trainer-skills');
Route::post('/add-trainer-skills', [TrainerController::class, 'storeSkills'])->name('trainer.skills.post');

Route::get('/trainer-session', [TrainerController::class, 'index'])->name('trainer-session');
Route::get('/change-session-status', [TrainerController::class, 'changeSessionStatus'])->name('change-session-status');







//  review


// user
Route::get('/user-session', [UserController::class, 'index'])->name('user-session');
Route::get('/user-book-session', [UserController::class, 'bookSession'])->name('user-book-session');

Route::get('/add-review/{id}', [UserController::class, 'addReview'])->name('addReview');
Route::post('/review-store', [UserController::class, 'storeReview'])->name('storeReview');
Route::get('/trainerSkills', [UserController::class, 'trainerSkills'])->name('trainerSkills');
Route::post('/user-booking', [UserController::class, 'store'])->name('user-booking');




Route::prefix('admin')->group(function () {

    Route::get('/', [AdminBookingController::class, 'index'])->name('admin.index');


    Route::resource('booking', AdminBookingController::class);
    Route::resource('users', AdminTrainerController::class);

    Route::get('/trainerSkills-a', [AdminTrainerController::class, 'trainerSkills'])->name('trainerSkills.admin');

    Route::resource('trainers', AdminUsersController::class);

Route::get('/change-session-status-admin', [AdminBookingController::class, 'changeSessionStatus'])->name('change-session-status-admin');

    

    // Route::post('/booking', [AdminController::class, 'booking'])->name('admin.booking');
    // Route::post('/booking-store', [AdminController::class, 'bookingStore'])->name('admin.booking.store');
});
