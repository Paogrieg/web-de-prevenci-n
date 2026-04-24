<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AdvertisingController;
use App\Http\Controllers\Api\AdviserController;
use App\Http\Controllers\Api\AdvisorController;
use App\Http\Controllers\Api\AvatarController;
use App\Http\Controllers\Api\CollaborationController;
use App\Http\Controllers\Api\CompaniesController;
use App\Http\Controllers\Api\ComplaintController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\EmergencyContactController;
use App\Http\Controllers\Api\EvidenceController;
use App\Http\Controllers\Api\EvidenceFileController;
use App\Http\Controllers\Api\GenderVerificationController;
use App\Http\Controllers\Api\LawsController;
use App\Http\Controllers\Api\NewController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\RecordController;
use App\Http\Controllers\Api\SeguimientoCasoController;
use App\Http\Controllers\Api\TestimonialsController;
use App\Http\Controllers\Api\VerificationController;

Route::resource('/users',UsersController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('jwt')->group(function () {
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::put('/user', [AuthController::class, 'updateUser']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::resource('/advertising', AdvertisingController::class);
    Route::resource('/advisor', AdvisorController::class);
    Route::resource('/adviser', AdviserController::class);
    Route::resource('/avatar', AvatarController::class);
    Route::resource('/collaboration', CollaborationController::class);
    Route::resource('/companies', CompaniesController::class);
    Route::resource('/complaint', ComplaintController::class);
    Route::resource('/contact', ContactController::class);
    Route::resource('/emergencyContact', EmergencyContactController::class);
    Route::resource('/evidence', EvidenceController::class);
    Route::resource('/evidenceFile', EvidenceFileController::class);
    Route::resource('/genderVerification', GenderVerificationController::class);
    Route::resource('/laws', LawsController::class);
    Route::resource('/new', NewController::class);
    Route::resource('/payment', PaymentController::class);
    Route::resource('/record', RecordController::class);
    Route::resource('/seguimientoCaso', SeguimientoCasoController::class);
    Route::resource('/testimonials', TestimonialsController::class);
    Route::resource('/verification', VerificationController::class);
});