<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Models\User;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/admin/login', [HomeController::class, 'admin_login'])->name('admin.login');
Route::get('/admin/dashboard', [HomeController::class, 'admin_dashboard'])->name('admin.dashboard');
Route::get('/admin/user_management', [HomeController::class, 'user_management'])->name('admin.user_management');
Route::get('/admin/product_management', [HomeController::class, 'product_management'])->name('admin.product_management');


Route::resource('user', CustomerController::class);
Route::resource('product', ProductController::class);