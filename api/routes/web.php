<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * Register
 */

Route::post('/api/register', [\App\Http\Controllers\UserController::class,'register']);

/**
 * login
 */

Route::post('/api/login', [\App\Http\Controllers\UserController::class,'login']);

/**
 * CarController
 */

Route::resource('/api/car',\App\Http\Controllers\CarController::class);


