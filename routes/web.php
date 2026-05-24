<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\StaticController;

use App\Http\Controllers\SliderController;

use App\Http\Controllers\GalleryController;

use App\Http\Controllers\HomeController;

Route::middleware('guest')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::get('/login', [AuthController::class, 'loginForm']);
        Route::post('/login', [AuthController::class, 'login']);
});

    Route::get('/admin', [AuthController::class, 'loginForm'])->name('login')->middleware('guest');


    Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', function () {
        return view("control-panel/Welcome");
    });

    Route::delete('admin/users/bulk-delete', [AdminController::class, 'bulkDelete'])
    ->name('users.bulkDelete');

    Route::resource('admin/users', AdminController::class);

    
    Route::get('/logout', [AuthController::class, 'logout']);


    Route::delete('static/pages/bulk-delete', [StaticController::class, 'bulkDelete'])
        ->name('statics.bulkDelete');

    Route::resource('static/pages', StaticController::class);

    Route::delete('slider/bulk-delete', [SliderController::class, 'bulkDelete'])
        ->name('slider.bulkDelete');

    Route::resource('slider', SliderController::class);


    Route::delete('gallery/bulk-delete', [GalleryController::class, 'bulkDelete'])
        ->name('gallery.bulkDelete');

    Route::resource('gallery', GalleryController::class);
    

});