<?php

use App\Http\Controllers\Admin\PropertyController;
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

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/properties',                 [ PropertyController::class, 'index' ])->name('properties.index');
    Route::get('/properties/create',          [ PropertyController::class, 'create' ])->name('properties.create');
    Route::get('/properties/{property}',      [ PropertyController::class, 'show' ])->name('properties.show');
    Route::post('/properties',                [ PropertyController::class, 'store' ])->name('properties.store');
    Route::get('/properties/{property}/edit', [ PropertyController::class, 'edit' ])->name('properties.edit');
    Route::put('/properties/{property}',      [ PropertyController::class, 'update' ])->name('properties.update');
    Route::delete('/properties/{property}',   [ PropertyController::class, 'destroy' ])->name('properties.destroy');
});
