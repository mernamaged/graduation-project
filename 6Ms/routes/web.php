<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfirmOrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Detail1Controller;
use App\Http\Controllers\Detail2Controller;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RawController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
use App\Models\feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//login and registration
Route::get('/reg', [UserController::class, 'register'])->name('register');
Route::POST('/reg', [UserController::class, 'registerPost'])->name('register');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::POST('/login', [UserController::class, 'loginPost'])->name('login');
Route::delete('/logout', [UserController::class, 'logout'])->name('logout');
//Route::get('/auth', [AuthController::class ,'index'])->name('auth')->middleware('auth');
Route::resource('contact', ContactController::class)->middleware('auth');
Route::resource('feedbacks', FeedbackController::class)->middleware('auth');



Route::post('/cart/store', [OrderController::class, 'store'])->name('carts.store')->middleware('auth');
Route::delete('/carts/{id}', [OrderController::class, 'destroy'])->name('carts.destroy')->middleware('auth');


Route::post('/detail2/{id}/store', [Detail2Controller::class, 'store'])->name('detail2.store')->middleware('auth');
Route::post('/detail2/{id}/store', [Detail2Controller::class, 'store'])->name('detail2.store')->middleware('auth');
Route::get('/detail2', [Detail2Controller::class, 'index'])->name('detail2.index')->middleware('auth');
Route::put('/products/{id}/store', [Detail2Controller::class, 'update'])->name('detail2.update')->middleware('auth');
Route::delete('/carts/{cart}', [Detail2Controller::class, 'destroy'])->name('carts.destroy')->middleware('auth');

Route::post('/cash/store', [ConfirmOrderController::class, 'store'])->name('cash.store')->middleware('auth');


Route::post('/products/{id}/store', [OrderController::class, 'store'])->name('carts.store')->middleware('auth');
Route::get('/auth', [AuthController::class, 'index'])->name('auth.index')->middleware('auth');
Route::put('/products/{id}/store', [OrderController::class, 'update'])->name('carts.update')->middleware('auth');



Route::resource('raw', RawController::class)->middleware('auth');
Route::resource('auth', AuthController::class)->middleware('auth');



Route::get('/payment', [PaymentController::class ,'index'])->name('payment')->middleware('auth');
//Route::get('/feedback', [FeedbackController::class ,'index'])->name('feedback')->middleware('auth');
//Route::get('/detail2', [Detail2Controller::class ,'index'])->name('detail2')->middleware('auth');
Route::get('/index', [IndexController::class ,'index'])->name('index');
Route::delete('/logout', [UserController::class ,'logout'])->name('logout')->middleware('auth');
Route::resource('feedback',FeedbackController::class);

Route::resource('cash',ConfirmOrderController::class);

Route::get('/stripe/{totalPrice}', [ConfirmOrderController::class ,'stripe']);
Route::post('stripe/{totalPrice}', [ConfirmOrderController::class ,'stripePost'])->name('stripe.post')->middleware('auth');
