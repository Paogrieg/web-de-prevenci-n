<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\EmergencyContactController;
use App\Http\Controllers\LawsController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\GenderVerificationController;

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');
Route::get('/docs', function () {
    return view('docs');
});
Route::get('/inicio', function () {
    return view('inicio');
})->middleware('auth');

Route::middleware('auth')->group(function () {

    // Usuarias
    Route::get('/users', [UsersController::class, 'index']);
    Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::patch('/users/{user}/verify', [UsersController::class, 'verify'])->name('users.verify');

    // Denuncias
    Route::get('/denuncias', [ComplaintController::class, 'complaint']);
    Route::post('/denuncias', [ComplaintController::class, 'store'])->name('denuncias.store');
    Route::put('/denuncias/{id}', [ComplaintController::class, 'update'])->name('denuncias.update');
    Route::delete('/denuncias/{id}', [ComplaintController::class, 'destroy'])->name('denuncias.destroy');

    // Emergencia
    Route::get('/emergencia', [EmergencyContactController::class, 'emergency']);
    Route::post('/emergencia', [EmergencyContactController::class, 'store'])->name('emergencia.store');
    Route::put('/emergencia/{id}', [EmergencyContactController::class, 'update'])->name('emergencia.update');
    Route::delete('/emergencia/{id}', [EmergencyContactController::class, 'destroy'])->name('emergencia.destroy');

    // Leyes
    Route::get('/leyes', [LawsController::class, 'law']);
    Route::post('/leyes', [LawsController::class, 'store'])->name('leyes.store');
    Route::put('/leyes/{id}', [LawsController::class, 'update'])->name('leyes.update');
    Route::delete('/leyes/{id}', [LawsController::class, 'destroy'])->name('leyes.destroy');

    // Noticias
    Route::get('/noticias', [NewController::class, 'news']);
    Route::post('/noticias', [NewController::class, 'store'])->name('noticias.store');
    Route::put('/noticias/{id}', [NewController::class, 'update'])->name('noticias.update');
    Route::delete('/noticias/{id}', [NewController::class, 'destroy'])->name('noticias.destroy');

    // Pagos
    Route::get('/pagos', [PaymentController::class, 'Payment']);
    Route::post('/pagos', [PaymentController::class, 'store'])->name('pagos.store');
    Route::put('/pagos/{id}', [PaymentController::class, 'update'])->name('pagos.update');
    Route::delete('/pagos/{id}', [PaymentController::class, 'destroy'])->name('pagos.destroy');

    // Testimonios
    Route::get('/testimonios', [TestimonialsController::class, 'testimonials']);
    Route::post('/testimonios', [TestimonialsController::class, 'store'])->name('testimonios.store');
    Route::put('/testimonios/{id}', [TestimonialsController::class, 'update'])->name('testimonios.update');
    Route::delete('/testimonios/{id}', [TestimonialsController::class, 'destroy'])->name('testimonios.destroy');

    // Verificaciones
    Route::get('/verificaciones', [VerificationController::class, 'Verification']);
    Route::post('/verificaciones', [VerificationController::class, 'store'])->name('verificaciones.store');
    Route::put('/verificaciones/{id}', [VerificationController::class, 'update'])->name('verificaciones.update');
    Route::delete('/verificaciones/{id}', [VerificationController::class, 'destroy'])->name('verificaciones.destroy');

    // Verificacion de genero
    Route::post('/verificar-genero', [GenderVerificationController::class, 'store'])->name('gender.verify');

    Route::get('/configuracion', function () {
        return view('configuracion');
    });

    Route::get('/construccion', function () {
        return view('construccion');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');