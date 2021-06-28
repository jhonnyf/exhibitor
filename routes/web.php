<?php

use App\Http\Controllers\Console\ContentController;
use App\Http\Controllers\Console\DashboardController;
use App\Http\Controllers\Console\FileController;
use App\Http\Controllers\Console\LoginController;
use App\Http\Controllers\Console\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'console'], function () {

    Route::get('logoff', [LoginController::class, 'logoff'])->name('console.logoff');

    Route::get('', function () {
        return redirect()->route('dashboard.index');
    });

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('', [DashboardController::class, 'index'])->name('dashboard.index');
    });

    Route::group(['prefix' => 'user'], function () {

        Route::group(['prefix' => 'other'], function () {
            Route::get('{id}', [UserController::class, 'other'])->name('user.other');
            Route::put('update/{id}', [UserController::class, 'otherUpdate'])->name('user.other-update');
        });

        Route::get('', [UserController::class, 'index'])->name('user.index');
        Route::get('form/{id?}', [UserController::class, 'form'])->name('user.form');
        Route::post('store', [UserController::class, 'store'])->name('user.store');
        Route::put('update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('status/{id}', [UserController::class, 'status'])->name('user.status');
        Route::get('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::group(['prefix' => 'file'], function () {
        Route::get('gallery/{module}/{id}', [FileController::class, 'gallery'])->name('file.gallery');
        Route::post('{module}/{id}/{file_gallery_id}', [FileController::class, 'upload'])->name('file.upload');
        Route::get('form/{id}', [FileController::class, 'index'])->name('file.form');
        Route::put('update/{id}', [FileController::class, 'update'])->name('file.update');
        Route::post('status/{id}', [FileController::class, 'status'])->name('file.status');
        Route::post('destroy/{id}', [FileController::class, 'destroy'])->name('file.destroy');
    });

    Route::group(['prefix' => 'content'], function () {
        Route::get('', [ContentController::class, 'index'])->name('content.index');
        Route::get('form/{id?}', [ContentController::class, 'form'])->name('content.form');
        Route::post('store', [ContentController::class, 'store'])->name('content.store');
        Route::put('update/{id}', [ContentController::class, 'update'])->name('content.update');
        Route::post('status/{id}', [ContentController::class, 'status'])->name('content.status');
        Route::post('destroy/{id}', [ContentController::class, 'destroy'])->name('content.destroy');
    });

});
