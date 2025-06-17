<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaryCertificateController;
use App\Http\Controllers\RequestConfirmationLetterController;

Route::get('/', [AuthController::class, 'index'])->name('admin-login');

Route::post('/admins/login', [AuthController::class, 'login']);
Route::get('/admins/logout', [AuthController::class, 'logout']);

Route::middleware(['admin'])->group(function () {

    Route::view('/dashboard', 'template.dashboard')->name('dashboard');
    Route::get('/admins/change-password', [AuthController::class, 'getViewChangePassword']);
    Route::patch('/admins/change-password', [AuthController::class, 'changePassword']);

    Route::get('/salary-certificates/index', [SalaryCertificateController::class, 'index'])->name('salary-certificate');
    Route::get('/salary-certificates/create', [SalaryCertificateController::class, 'create'])->name('salary-certificate.create');
    Route::post('/salary-certificates/store', [SalaryCertificateController::class, 'store'])->name('salary-certificate.store');
    Route::get('/salary-certificates/show/{id}', [SalaryCertificateController::class, 'show'])->name('salary-certificate-preview');
    Route::get('/export-word', [SalaryCertificateController::class, 'exportCustomWord']);

    Route::get('/confirmation-letters/index', [RequestConfirmationLetterController::class, 'index'])->name('request-confirmation-letter');
    Route::get('/confirmation-letters/create', [RequestConfirmationLetterController::class, 'create'])->name('request-confirmation-letter.create');
    Route::post('/confirmation-letters/store', [RequestConfirmationLetterController::class, 'store'])->name('request-confirmation-letter.store');
    Route::get('/confirmation-letters/show/{id}', [RequestConfirmationLetterController::class, 'show'])->name('request-confirmation-letter-preview');
    Route::get('/confirmation-letters/{id}/edit', [RequestConfirmationLetterController::class, 'edit'])->name('request-confirmation-letter.edit');
    Route::put('/confirmation-letters/update/{id}', [RequestConfirmationLetterController::class, 'update'])->name('request-confirmation-letter.update');
    Route::delete('/confirmation-letters/{id}', [RequestConfirmationLetterController::class, 'destroy'])->name('request-confirmation-letter.destroy');
});
