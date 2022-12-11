<?php

use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\StateController;
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
Route::get('/propiedades/{property}', [ PropertiesController::class, 'show' ])->name('properties.show');

Route::get('/contact', [ ContactController::class, 'index' ])->name('contact.index');
Route::post('/contact/send', [ ContactController::class, 'send' ])->name('contact.send');

Route::get('/ciudades-json', [ CityController::class, 'getJson' ])->name('cities.json');
Route::get('/estados-json', [ StateController::class, 'getJson' ])->name('states.json');

require __DIR__.'/auth.php';

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/properties',                 [ PropertyController::class, 'index' ])->name('properties.index');
    Route::get('/properties/create',          [ PropertyController::class, 'create' ])->name('properties.create');
    Route::post('/properties',                [ PropertyController::class, 'store' ])->name('properties.store');
    Route::get('/properties/{property}',      [ PropertyController::class, 'show' ])->name('properties.show');
    Route::get('/properties/{property}/edit', [ PropertyController::class, 'edit' ])->name('properties.edit');
    Route::put('/properties/{property}',      [ PropertyController::class, 'update' ])->name('properties.update');
    Route::delete('/properties/{property}',   [ PropertyController::class, 'destroy' ])->name('properties.destroy');

    Route::get('/property/{property}/images', [ PropertyController::class, 'showPropertyImages' ])->name('property.images');
    Route::post('/property/{property}/images', [ PropertyController::class, 'addImage' ])->name('property.add-image');
    Route::put('/property/{property}/images/{imageId}', [ PropertyController::class, 'removeImage' ])
        ->name('property.remove-image');

    Route::get('/users',             [ UserController::class, 'index' ])    ->name('users.index');
    Route::get('/users/create',      [ UserController::class, 'create' ])   ->name('users.create');
    Route::post('/users',            [ UserController::class, 'store' ])    ->name('users.store');
    Route::get('/users/{user}',      [ UserController::class, 'show' ])     ->name('users.show');
    Route::get('/users/{user}/edit', [ UserController::class, 'edit' ])     ->name('users.edit');
    Route::put('/users/{user}',      [ UserController::class, 'update' ])   ->name('users.update');
    Route::delete('/users/{user}',   [ UserController::class, 'destroy' ])  ->name('users.destroy');
});
