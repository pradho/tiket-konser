<?php

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

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('front.index');
Route::get('/booking/{id}', [App\Http\Controllers\FrontController::class, 'booking'])->name('front.booking');
Route::post('/booking/store', [App\Http\Controllers\FrontController::class, 'bookingStore'])->name('front.booking.store');
Route::get('/booking/payment/{id}', [App\Http\Controllers\FrontController::class, 'payment'])->name('front.booking.payment');
Route::post('/booking/payment/store', [App\Http\Controllers\FrontController::class, 'paymentStore'])->name('front.payment.store');
Route::get('/ticket/{id}', [App\Http\Controllers\FrontController::class, 'ticketDetail'])->name('front.ticket');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/concert', [App\Http\Controllers\ConcertController::class, 'index'])->name('admin.concert.index');
    Route::get('/admin/concert/create', [App\Http\Controllers\ConcertController::class, 'create'])->name('admin.concert.create');
    Route::post('/admin/concert/store', [App\Http\Controllers\ConcertController::class, 'store'])->name('admin.concert.store');
    Route::get('/admin/concert/destroy/{id}', [App\Http\Controllers\ConcertController::class, 'destroy'])->name('admin.concert.delete');
    Route::get('/admin/ticket', [App\Http\Controllers\CustomerController::class, 'index'])->name('admin.ticket.index');
    Route::get('/admin/ticket/checkin', [App\Http\Controllers\CustomerController::class, 'checkIn'])->name('admin.ticket.checkin');
    Route::post('/admin/ticket/store', [App\Http\Controllers\CustomerController::class, 'checkInStore'])->name('admin.ticket.checkin.store');
});
