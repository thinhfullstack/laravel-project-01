<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\StudentController;
use Illuminate\Support\Facades\Route;

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
    // return view('app');
});

Route::get('students', [StudentController::class, 'index'])->name('students.index');
Route::get('students/{id}', [StudentController::class, 'show'])->name('students.show');

Route::prefix('admin')->as('admin.')->group(function() {
    Route::get('user', [UserController::class, 'index'])
        ->middleware('checkLogic')
        ->name('user.index');
    Route::get('category', [CategoryController::class, 'index'])
        ->middleware('verified.admin')
        ->name('category.index');
    Route::get('product', [ProductController::class, 'index']);
    Route::resource('customers', CustomerController::class)->only('index', 'update', 'destroy');
});

Route::put('edit-user', function() {
    return "UPdate user";
})->name('user.edit');

Route::get('login', function() {
    return "login Page";
})->name('login');

// Admin routes
Route::prefix('admin')->as('admin.')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('user', UserController::class);
    Route::resource('setting', SettingController::class);
});
