<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;


Route::resource('admin', AdminController::class);
Route::resource('menu', MenuController::class);
Route::resource('order', OrderController::class);
Route::resource('sales-report', SalesReportController::class);
Route::resource('home', HomeController::class);

// Dashboard - Dengan Pengecekan Session di Route
Route::get('dashboard', function () {
    if (!session('admin_id')) {
        return redirect()->route('login')->withErrors(['error' => 'You must be logged in to access the dashboard.']);
    }
    return view('dashboard', ['admin_name' => session('admin_name')]);
})->name('dashboard');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
