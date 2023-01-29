<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [Dashboard\DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('admins', Dashboard\AdminController::class);
        Route::post('admins/changeStatus', [Dashboard\AdminController::class, 'changeStatus'])->name('admin.changeStatus');

        #################### Start Route Resource Advertisments ###############################
        Route::resource('advertisments', Dashboard\AdvertismentController::class);
        //Route::post('advertisments/changeStatus', [Dashboard\AdvertismentController::class, 'changeStatus'])->name('advertisments.changeStatus');
        #################### End Route Resource Advertisments ###############################
        
        #################### Start Route Resource Category ###############################
        Route::resource('categories', Dashboard\CategoryController::class);
        Route::post('categories/changeStatus', [Dashboard\CategoryController::class, 'changeStatus'])->name('categories.changeStatus');
        #################### End Route Resource Category ###############################

        #################### Start Route Resource Tage ###############################
        Route::resource('tag', Dashboard\TagController::class);
        Route::post('tag/changeStatus', [Dashboard\TagController::class, 'changeStatus'])->name('tag.changeStatus');
        #################### End Route Resource Tage ###############################


        #################### Start Route Resource post ###############################
        Route::resource('post', Dashboard\PostController::class);
        Route::post('post/changeStatus', [Dashboard\PostController::class, 'changeStatus'])->name('post.changeStatus');
        #################### End Route Resource post ###############################



        Route::post('admins/changeStatus',[Dashboard\AdminController::class, 'changeStatus'])->name('admin.changeStatus');
        // Publishers
        Route::resource('publishers', Dashboard\PublisherController::class);
        Route::post('publishers/changeStatus',[Dashboard\PublisherController::class, 'changeStatus'])->name('publisher.changeStatus');
        // Users
        Route::resource('users', Dashboard\UserController::class);
        Route::post('users/changeStatus',[Dashboard\UserController::class, 'changeStatus'])->name('user.changeStatus');

        #################### Start Route Resource Sections ###############################
        Route::resource('sections', Dashboard\SectionController::class);
        Route::post('sections/changeStatus', [Dashboard\SectionController::class, 'changeStatus'])->name('sections.changeStatus');
        #################### End Route Resource Sections ###############################

    });
});

require __DIR__ . '/auth.php';