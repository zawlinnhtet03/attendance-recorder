<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::delete('/participants/{id}', [ParticipantController::class, 'destroy'])->name('participants.destroy');


Route::get('/generate-qr', [AdminController::class, 'generateQrCode'])->name('admin.generateQrCode'); 
Route::get('/check-in-form', [ParticipantController::class, 'showForm'])->name('participant.showForm');
Route::post('/check-in', [ParticipantController::class, 'store'])->name('participant.store');
Route::get('/check-in-success', function () {
    return view('admin.check-in-success');
})->name('participant.success');


Route::get('/generate-logout-qr-code', [AdminController::class, 'generateLogoutQrCode'])->name('admin.generateLogoutQrCode'); 
Route::get('/check-out-form', [ParticipantController::class, 'showCheckOutForm'])->name('participant.showCheckOutForm');
Route::post('/check-out', [ParticipantController::class, 'logout'])->name('participant.out');
Route::get('/check-out-success', function () {
    return view('admin.check-out-success');
})->name('participant.successCheckout');


Route::get('/ask-check-in', [ParticipantController::class, 'showAskCheckIn'])->name('participant.showAskCheckIn');
Route::post('/check-in-or-check-out', [ParticipantController::class, 'handleCheckInOrCheckOut'])->name('participant.checkInOrCheckOut');
Route::get('/only-check-out', [ParticipantController::class, 'showOnlyCheckOut'])->name('participant.showOnlyCheckOut');
Route::post('/only-check-out-process', [ParticipantController::class, 'storeCheckOut'])->name('participant.storeCheckOut');
Route::get('/only-check-out-success', function () {
    return view('admin.only-check-out-success');
})->name('participant.successCheckOutOnly');

// Route::get('/check-in-question', [ParticipantController::class, 'showCheckInQuestionForm'])->name('participant.checkInQuestionForm');

require __DIR__.'/auth.php';
