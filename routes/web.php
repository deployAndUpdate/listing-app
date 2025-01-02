<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [ListingController::class, 'index'])->name('home');

Route::resource('listing', ListingController::class)->except('index');

require __DIR__.'/auth.php';
