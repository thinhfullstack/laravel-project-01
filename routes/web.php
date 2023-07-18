<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
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
    return view('welcome');
});

Route::get('students', [StudentController::class, 'index'])->name('students.index');
Route::get('students/{id}', [StudentController::class, 'show'])->name('students.show');

Route::prefix('admin')->group(function() {
    Route::get('user', [UserController::class, 'index']);
    Route::get('category', [CategoryController::class, 'index']);
    Route::get('product', [ProductController::class, 'index']);
});
