<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\WellcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [WellcomeController::class, 'index'])->name('home.index');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/propiedades', [ PropertiesController::class, 'index' ])->name('properties.index');

Route::get('/contact', [ ContactController::class, 'index' ])->name('contact.index');
Route::post('/contact/send', [ ContactController::class, 'send' ])->name('contact.send');

require __DIR__.'/auth.php';
