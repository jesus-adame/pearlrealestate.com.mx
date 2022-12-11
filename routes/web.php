<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WellcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\PropertyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [ WellcomeController::class, 'index' ])->name('home.index');

Route::get('/dashboard', [ DashboardController::class, 'index' ])->middleware(['auth'])->name('dashboard');

Route::get('/propiedades', [ PropertiesController::class, 'index' ])->name('properties.index');
Route::get('/propiedades/{property}', [ PropertiesController::class, 'show' ])->name('properties.show');

Route::get('/contact', [ ContactController::class, 'index' ])->name('contact.index');
Route::post('/contact/send', [ ContactController::class, 'send' ])->name('contact.send');

Route::get('/ciudades-json', [ CityController::class, 'getJson' ])->name('cities.json');
Route::get('/estados-json', [ StateController::class, 'getJson' ])->name('states.json');

require_once __DIR__.'/auth.php';

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/properties', [ PropertyController::class, 'index' ])->name('properties.index');
    Route::get('/properties/create', [ PropertyController::class, 'create' ])->name('properties.create');
    Route::post('/properties', [ PropertyController::class, 'store' ])->name('properties.store');
    Route::get('/properties/{property}', [ PropertyController::class, 'show' ])->name('properties.show');
    Route::get('/properties/{property}/edit', [ PropertyController::class, 'edit' ])->name('properties.edit');
    Route::put('/properties/{property}', [ PropertyController::class, 'update' ])->name('properties.update');
    Route::delete('/properties/{property}', [ PropertyController::class, 'destroy' ])->name('properties.destroy');

    Route::get('/property/{property}/images', [ PropertyController::class, 'showPropertyImages' ])
        ->name('property.images');
    Route::post('/property/{property}/images', [ PropertyController::class, 'addImage' ])
        ->name('property.add-image');
    Route::put('/property/{property}/images/{imageId}', [ PropertyController::class, 'removeImage' ])
        ->name('property.remove-image');

    Route::get('/create-property-owner/{property}', [ PropertyController::class, 'createOwner' ])
        ->name('create.property.owner');
    Route::post('/property/{property}/owner', [ PropertyController::class, 'addOwner' ])
        ->name('property.add-owner');
    Route::put('/property/{property}/owner', [ PropertyController::class, 'removeOwner' ])
        ->name('property.remove-owner');

    Route::get('/owners', [ OwnerController::class, 'index' ])->name('owners.index');
    Route::get('/owners/create', [ OwnerController::class, 'create' ])->name('owners.create');
    Route::post('/owners', [ OwnerController::class, 'store' ])->name('owners.store');
    Route::get('/owners/{owner}', [ OwnerController::class, 'show' ])->name('owners.show');
    Route::get('/owners/{owner}/edit', [ OwnerController::class, 'edit' ])->name('owners.edit');
    Route::put('/owners/{owner}', [ OwnerController::class, 'update' ])->name('owners.update');
    Route::delete('/owners/{owner}', [ OwnerController::class, 'destroy' ])->name('owners.destroy');

    Route::get('/users', [ UserController::class, 'index' ])->name('users.index');
    Route::get('/users/create', [ UserController::class, 'create' ])->name('users.create');
    Route::post('/users', [ UserController::class, 'store' ])->name('users.store');
    Route::get('/users/{user}', [ UserController::class, 'show' ])->name('users.show');
    Route::get('/users/{user}/edit', [ UserController::class, 'edit' ])->name('users.edit');
    Route::put('/users/{user}', [ UserController::class, 'update' ])->name('users.update');
    Route::delete('/users/{user}', [ UserController::class, 'destroy' ])->name('users.destroy');
});
