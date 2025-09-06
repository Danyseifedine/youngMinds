<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('welcome');

// Registration routes
Route::get('/register', [RegistrationController::class, 'show'])->name('registration.form');
Route::post('/register', [RegistrationController::class, 'submit'])->name('registration.submit');
