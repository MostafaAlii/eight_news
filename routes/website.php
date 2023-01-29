<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['as' => 'website.'], function () {
    Route::get('/',[Website\HomeController::class, 'index'])->name('home');
    Route::get('about-us',[Website\AboutController::class, 'index'])->name('about');
});

require __DIR__.'/auth.php';