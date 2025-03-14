<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NumberPlateController;
use App\Http\Controllers\ProductController;

Route::get('/', [NumberPlateController::class, 'index']);
Route::post('/save-customization', [NumberPlateController::class, 'store']);
Route::get('/test', function () {
    return view('test');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::view('order','order');
    Route::resource('products', ProductController::class);
});

require __DIR__.'/auth.php';

Auth::routes();

Route::view('about','about');
Route::view('contact','contact');