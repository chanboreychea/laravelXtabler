<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaryCertificateController;
use App\Http\Controllers\RequestConfirmationLetterController;

route::get('/', [AuthController::class, 'index'])->name('admin-login');

Route::post('/admins/login', [AuthController::class, 'login']);
Route::get('/admins/logout', [AuthController::class, 'logout']);

Route::middleware(['admin'])->group(function () {

    route::view('/dashboard', 'template.dashboard')->name('dashboard');
    Route::get('/admins/change-password', [AuthController::class, 'getViewChangePassword']);
    Route::patch('/admins/change-password', [AuthController::class, 'changePassword']);

    route::get('/salary-certificates/index', [SalaryCertificateController::class, 'index'])->name('salary-certificate');
    route::get('/salary-certificates/create', [SalaryCertificateController::class, 'create'])->name('salary-certificate.create');
    route::post('/salary-certificates/store', [SalaryCertificateController::class, 'store'])->name('salary-certificate.store');
    route::get('/salary-certificates/show/{id}', [SalaryCertificateController::class, 'show'])->name('salary-certificate-preview');
    Route::get('/export-word', [SalaryCertificateController::class, 'exportCustomWord']);

    route::get('/confirmation-letters/index', [RequestConfirmationLetterController::class, 'index'])->name('request-confirmation-letter');
    route::get('/confirmation-letters/create', [RequestConfirmationLetterController::class, 'create'])->name('request-confirmation-letter.create');
    route::post('/confirmation-letters/store', [RequestConfirmationLetterController::class, 'store'])->name('request-confirmation-letter.store');
    route::get('/confirmation-letters/show/{id}', [RequestConfirmationLetterController::class, 'show'])->name('request-confirmation-letter-preview');
    route::get('/confirmation-letters/{id}/edit', [RequestConfirmationLetterController::class, 'edit'])->name('request-confirmation-letter.edit');
    route::put('/confirmation-letters/update/{id}', [RequestConfirmationLetterController::class, 'update'])->name('request-confirmation-letter.update');
    route::delete('/confirmation-letters/{id}', [RequestConfirmationLetterController::class, 'destroy'])->name('request-confirmation-letter.destroy');
});
