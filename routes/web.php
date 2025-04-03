<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NumberPlateController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;


Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');


    // Route::view('order','order');
    Route::get('/order', [OrderController::class, 'index'])->name('order');

    Route::resource('products', ProductController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', [NumberPlateController::class, 'index'])->name('index');
Route::get('/get-flags', [NumberPlateController::class, 'getFlags']);
Route::get('/plate-prices', [NumberPlateController::class, 'getPlatePrices']);


Route::post('/save-customization', [NumberPlateController::class, 'store']);


Route::post('/cart/add', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/track-order', [OrderController::class, 'trackOrder'])->name('track.order');



Route::post('/paypal/create', [PayPalController::class, 'createOrder'])->name('paypal.create');
Route::get('/paypal/success', [PayPalController::class, 'captureOrder'])->name('paypal.success');
Route::get('/paypal/cancel', function () {
    return redirect()->route('checkout')->with('error', 'Payment was canceled.');
})->name('paypal.cancel');

Route::post('/contact-us', [ContactController::class, 'submit'])->name('contact.submit');


require __DIR__.'/auth.php';

// Auth::routes();

Route::view('about','about');
Route::view('contact','contact');
Route::view('gallery','gallery');
