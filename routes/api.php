<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\ChangeLang;
use Illuminate\Support\Facades\Route;


// login
Route::post('login', [AuthController::class, 'login']);




