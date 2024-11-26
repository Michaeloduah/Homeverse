<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\ClientConrtroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
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
        return view('index');
    });

Auth::routes(['verify' => true]);

Route::middleware('auth', 'verified')->group(function () {
    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('index');
        Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
        Route::get('editprofile', [DashboardController::class, 'editprofile'])->name('editprofile');
        Route::post('updateprofile/{id}', [DashboardController::class, 'updateprofile'])->name('updateprofile');

        Route::name('agent.')->prefix('agent')->group(function () {
            Route::get('create-property', [AgentController::class, 'createproperty'])->name('createproperty');
            Route::post('store-property', [AgentController::class, 'storeproperty'])->name('storeproperty');
            Route::get('my-property', [AgentController::class, 'myproperty'])->name('myproperty');
            Route::get('edit-property/{id}', [AgentController::class, 'editproperty'])->name('editproperty');
            Route::post('update-property/{id}', [AgentController::class, 'updateproperty'])->name('updateproperty');
            Route::get('orders', [AgentController::class, 'orders'])->name('orders');
            Route::get('{id}', [AgentController::class, 'deleteproperty'])->name('deleteproperty');
        });

        Route::name('client.')->prefix('client')->group(function () {
            Route::get('house-for-sale', [ClientConrtroller::class, 'houseforsale'])->name('houseforsale');
            Route::get('house-for-rent', [ClientConrtroller::class, 'houseforrent'])->name('houseforrent');
        });

        Route::name('admin.')->prefix('admin')->group(function () {

        });

    });

});