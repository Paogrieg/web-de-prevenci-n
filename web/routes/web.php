<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ComplaintController;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/inicio', function () {
    return view('inicio');
});
//ruta controlador
Route::get('/users', [UsersController::class,'index']);
Route::get('/denuncias', [ComplaintController::class,'complaint']);
Route::get('/emergencia', [UsersController::class,'']);


Route::get('/configuracion', function () {
    return view('configuracion');
});




Route::get('/leyes', function () {
    return view('leyes');
});
Route::get('/noticias', function () {
    return view('noticias');
});
Route::get('/pagos', function () {
    return view('pagos');
});
Route::get('/testimonios', function () {
    return view('testimonios');
});
Route::get('/verificaciones', function () {
    return view('verificaciones');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
