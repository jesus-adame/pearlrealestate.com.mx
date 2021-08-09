<?php

use Illuminate\Support\Facades\Route;

// Register Twill routes here eg.
// Route::module('posts');
Route::module('pages');

Route::group(['prefix' => 'work'], function () {
    Route::group(['prefix' => 'projects'], function () {
        Route::module('projectCustomers');
    });
});