<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageManagementsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleManagementsContoller;

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

// Route::get('/', function () {
//     return view('home');
// });
Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');

Route::middleware(['auth','verified'])
    ->group(function(){
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

        // Route::prefix('package-management')
        //     ->middleware(['administrator'])
        //     ->group(function(){
        //     Route::get('/create', [App\Http\Controllers\PackageManagementsController::class, 'create'])->name('create');
        // });
        Route::get('driver/{id}',[UserController::class, 'detail'])->name('driver-detail');
        Route::delete('driver/{id}',[UserController::class, 'delete'])->name('driver-delete');

        Route::get('driver',[UserController::class, 'index'])->name('driver');
        Route::resource('package-management', PackageManagementsController::class)->middleware('administrator');
        Route::resource('vehicle-management', VehicleManagementsContoller::class)->middleware('administrator');
    });



