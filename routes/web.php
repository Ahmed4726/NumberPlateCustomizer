<?php

use App\Http\Controllers\NumberPlateController;
use Illuminate\Support\Facades\Route;


Route::get('/', [NumberPlateController::class, 'index']);
Route::post('/save-customization', [NumberPlateController::class, 'store']);
// Route::get('/', function () {
//     return view('welcome');
// });
