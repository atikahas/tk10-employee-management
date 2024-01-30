<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LeaveEntitlementController;

Route::get('/', function () {
    // return view('welcome');
    return Auth::check() ? redirect('/home') : redirect('/login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

    Route::get('leave-entitlement', [LeaveEntitlementController::class, 'index'])->name('le');
    Route::get('leave-entitlement/view/{user}', [LeaveEntitlementController::class, 'view'])->name('le.view');
    Route::get('leave-entitlement/create/{user}', [LeaveEntitlementController::class, 'create'])->name('le.create');
    Route::post('leave-entitlement/create', [LeaveEntitlementController::class, 'store'])->name('le.store');

});
