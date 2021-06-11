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
    Route::get('/profile',[App\Http\Controllers\dashboard::class,'profile']);
    Route::post('/add',[App\Http\Controllers\dashboard::class,'addProfile'])->name('addProfile');
    Route::post('/update',[App\Http\Controllers\dashboard::class,'updateProfile'])->name('updateProfile');
    Route::post('/searchTiket', [App\Http\Controllers\dashboardTiket::class, 'search'])->name('searchTiket');
    Route::post('/addToCart',[App\Http\Controllers\dashboardTiket::class, 'addCartDeparture'])->name('addCartTiket');
    Route::post('/prosesTiket',[App\Http\Controllers\prosesTiket::class, 'store'])->name('processTicket');
    
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'kereta'], function () {
        Route::get('/', [App\Http\Controllers\adminKereta::class, 'index']);
        Route::post('/addKereta', [App\Http\Controllers\adminKereta::class, 'store'])->name('addKereta');
        Route::post('/edit', [App\Http\Controllers\adminKereta::class, 'update'])->name('keretaEdit');
        Route::get('/delete/{id}', [App\Http\Controllers\adminKereta::class, 'destroy'])->name('keretaDelete');
    });
    Route::group(['prefix' => 'tiket'], function () {
        Route::get('/', [App\Http\Controllers\adminTiket::class, 'index']);
        Route::post('/addTiket', [App\Http\Controllers\adminTiket::class, 'store'])->name('addTiket');
        Route::post('/edit', [App\Http\Controllers\adminTiket::class, 'update'])->name('tiketEdit');
        Route::get('/delete/{id}', [App\Http\Controllers\adminTiket::class, 'destroy'])->name('tiketDelete');
    });
});