<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/inicio', function () {
    return view('inicio');
});
Route::get('/users', function () {
    return view('users');
});
Route::get('/configuracion', function () {
    return view('configuracion');
});
Route::get('/denuncias', function () {
    return view('denuncias');
});
Route::get('/emergencia', function () {
    return view('emergencia');
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