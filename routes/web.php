<?php

use App\Http\Controllers\Console\DashboardController;
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

    Route::group(['prefix' => 'user'], function(){
        Route::get('',[UserController::class, 'index'])->name('user.index');
        Route::get('form/{id?}',[UserController::class, 'form'])->name('user.form');
        Route::post('store',[UserController::class, 'store'])->name('user.store');
        Route::put('update/{id}',[UserController::class, 'update'])->name('user.update');
        Route::get('status/{id}',[UserController::class, 'status'])->name('user.status');
        Route::get('destroy/{id}',[UserController::class, 'destroy'])->name('user.destroy');
    });

});
