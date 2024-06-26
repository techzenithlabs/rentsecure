<?php

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

Route::get('/dashboard', function () {
    $role = Auth::user()->role_id;
    switch ($role) {
        case 1: //Super Admin
            return view('Admin.dashboard');
            break;
        case 2: //Super Admin
            break;
    }
    //return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';
