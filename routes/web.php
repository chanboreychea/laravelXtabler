<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('admin-login');

Route::post('/admins/login', [AuthController::class, 'login']);
Route::get('/admins/logout', [AuthController::class, 'logout']);

Route::middleware(['admin'])->group(function () {

    Route::view('/dashboard', 'template.dashboard')->name('dashboard');
    Route::get('/admins/change-password', [AuthController::class, 'getViewChangePassword']);
    Route::patch('/admins/change-password', [AuthController::class, 'changePassword']);


});
