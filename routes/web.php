<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\ScreeningController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/send-mail', [MailController::class, 'sendMail']);
Route::get('/state', [RegisteredUserController::class, 'getStates'])->name('state');

Route::get('/registration/success/{firstname}', function ($firstname) {
    return view('emails.registration-success', ['firstname' => $firstname]);
})->name('registration.success');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/property/landlord', [PropertyController::class, 'landLordProperty'])->name('property.landlord');
    Route::get('/screening/landlord', [ScreeningController::class, 'landlordScreening'])->name('screening.landlord');

    Route::get('/property', [PropertyController::class, 'myProperty'])->name('property');
    Route::get('/pricing', [PropertyController::class, 'Pricing'])->name('pricing');

    /*****Admin */

    Route::get('/screening/tenant', [ScreeningController::class, 'tenantScreening'])->name('screening.tenant');
    /****Admin */

    /***Landlord ***/
    Route::get('/landlord/screening/tenant', [ScreeningController::class, 'landlordtenantScreening'])->name('landlord.screening.tenant');

    /***Landlord ****/
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/admin-action', [AdminController::class, 'adminAction'])->name('admin-action');

});

require __DIR__ . '/auth.php';
