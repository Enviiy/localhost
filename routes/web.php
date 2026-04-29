<?php

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

Route::get('/', action: [App\Http\Controllers\WebController::class, 'home'])->name('index');


Auth::routes();


Route::get('/home', action: [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/menu', action: [App\Http\Controllers\WebController::class, 'menu'])->name('menu');
Route::get('/about', action: [App\Http\Controllers\WebController::class, 'about'])->name('about');
Route::get('/profile', action: [App\Http\Controllers\WebController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('/booking', [App\Http\Controllers\WebController::class, 'store'])->name('booking.store');

Route::get('/admin', action: [App\Http\Controllers\AdminController::class, 'admin'])->name('admin')->middleware('auth');

Route::post('/addProduct', [App\Http\Controllers\AdminController::class, 'addProduct'])->name('addProduct');
Route::get('/EditProductView/{id}', [App\Http\Controllers\AdminController::class, 'EditProductView'])->name('EditProductView');
Route::post('/EditProduct/{id}', [App\Http\Controllers\AdminController::class, 'EditProduct'])->name('EditProduct');
Route::delete('/deleteProduct', [App\Http\Controllers\AdminController::class, 'deleteProduct'])->name('deleteProduct');

Route::get('/EditUserView/{id}', [App\Http\Controllers\AdminController::class, 'EditUserView'])->name('EditUserView');
Route::post('/EditUser/{id}', [App\Http\Controllers\AdminController::class, 'EditUser'])->name('EditUser');

Route::delete('/DeleteUser/{id}', [App\Http\Controllers\AdminController::class, 'DeleteUser'])->name('DeleteUser');

Route::get('/EditBookingView/{id}', [App\Http\Controllers\AdminController::class, 'EditBookingView'])->name('EditBookingView');
Route::post('/EditBooking/{id}', [App\Http\Controllers\AdminController::class, 'EditBooking'])->name('EditBooking');

Route::delete('/DeleteBooking/{id}', [App\Http\Controllers\AdminController::class, 'DeleteBooking'])->name('DeleteBooking');
