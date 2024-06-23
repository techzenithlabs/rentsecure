<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\ScreeningController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'homePage'])->name('home');
Route::get('/{slug}', [HomeController::class, 'showPage']);

Route::get('/send-mail', [MailController::class, 'sendMail']);
Route::get('/state', [RegisteredUserController::class, 'getStates'])->name('state');

Route::get('/registration/success/{firstname}', function ($firstname) {
    return view('emails.registration-success', ['firstname' => $firstname]);
})->name('registration.success');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::match(['get', 'post'], '/property/landlord', [PropertyController::class, 'landLordProperty'])->name('property.landlord');
    Route::match(['get', 'post'], '/screening/landlord', [ScreeningController::class, 'landlordPropertyScreening'])->name('screening.landlord');

    Route::match(['get', 'post'], '/property', [PropertyController::class, 'myProperty'])->name('property');
    Route::get('/pricing', [PropertyController::class, 'Pricing'])->name('pricing');

    /*****Admin */
    Route::get('landlord-documents/{user_id}', [ScreeningController::class, 'viewDocuments'])->name('landlord.documents');

    Route::get('/screening/tenant', [ScreeningController::class, 'tenantScreening'])->name('screening.tenant');
    /**Screening steps ***/

    Route::post('/admin-action', [AdminController::class, 'adminAction'])->name('admin-action');
    Route::post('/screening-action', [PropertyController::class, 'ScreeningStatus'])->name('screening-action');

    Route::post('/upload-approved-documents', [PropertyController::class, 'uploadDocuments'])->name('upload-approved-documents');

    Route::match(['get', 'post'], '/cms', [AdminController::class, 'adminCMS'])->name('cms');
    Route::get('/cms/add', [AdminController::class, 'addCMS'])->name('cms.add');
    Route::match(['get', 'post'], '/cms/edit/{id?}', [AdminController::class, 'editCMS'])->name('cms.edit');

    /****Admin */

    /***Landlord ***/
    Route::match(['get', 'post'], '/landlord/screening/tenant/{step?}', [ScreeningController::class, 'landlordtenantScreening'])->name('landlord.screening.tenant');
    Route::post('/landlord/tenant-screening', [ScreeningController::class, 'tenantScreeningSubmission'])->name('landlord.tenant-screening');
    Route::post('/landlord/property/screening', [ScreeningController::class, 'PropertyScreening'])->name('property-screening');

    /***Landlord ****/
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';
