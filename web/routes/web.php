<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\EmergencyContactController;
use App\Http\Controllers\LawController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\VerificationController;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/inicio', function () {
    return view('inicio');
});
//ruta controlador
Route::get('/users', [UsersController::class,'index']);
Route::get('/denuncias', [ComplaintController::class,'complaint']);
Route::get('/emergencia', [EmergencyContactController::class,'emergency']);
Route::get('/leyes', [LawController::class,'law']);
Route::get('/noticias', [NewController::class,'news']);
Route::get('/pagos', [PaymentController::class,'Payment']);
Route::get('/testimonios', [TestimonialsController::class,'testimonials']);
Route::get('/verificaciones', [VerificationController::class,'Verification']);



Route::get('/configuracion', function () {
    return view('configuracion');
});

//ruta login
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
