<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register',[App\Http\Controllers\RegisterController::class,'index']);
Route::post('/store',[App\Http\Controllers\RegisterController::class,'store'])->name('registeraccount');
Route::get('/',[App\Http\Controllers\landing::class,'index']);
Route::post('login',[App\Http\Controllers\landing::class,'login'])->name('login');
Route::get('/logout',[App\Http\Controllers\landing::class,'login'])->name('logout');

Route::get('auth/google',[App\Http\Controllers\GoogleController::class,'redirectToGoogle'])->name('registergoogle');
Route::get('auth/google/callback',[App\Http\Controllers\GoogleController::class,'handleGoogleCallback'])->name('googlecallback');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard',[App\Http\Controllers\dashboard::class,'index']);
});