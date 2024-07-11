<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZipcodeController;

Route::get('/', [ZipcodeController::class,'index'])->name('index');
Route::post('/checkzipcode', [ZipcodeController::class,'store']);
Route::post('/checkzipcode', [ZipcodeController::class, 'checkZipcode'])->name('checkZipcode');