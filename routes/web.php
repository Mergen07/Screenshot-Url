<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScreenshotController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/screenshot', [ScreenshotController::class, 'showForm']);
Route::post('/screenshot', [ScreenshotController::class, 'screenshot']);