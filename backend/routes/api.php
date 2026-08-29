<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Public Lead Capture & public CMS read routes
Route::post('/contacts', [ContactController::class, 'submit'])->middleware('throttle:20,1');
Route::get('/resources', [CMSController::class, 'index']);
Route::get('/resources/{slug}', [CMSController::class, 'show']);

// Authentication & Secure Client Portal Routes
// We apply EncryptCookies and StartSession to enable HttpOnly session tracking
Route::middleware([
    \Illuminate\Cookie\Middleware\EncryptCookies::class,
    \Illuminate\Session\Middleware\StartSession::class,
])->group(function () {
    Route::post('/auth/login', [AuthController::class, 'login'])->middleware('throttle:10,1');
    Route::post('/auth/admin/login', [AuthController::class, 'adminLogin'])->middleware('throttle:10,1');
    Route::get('/auth/user', [AuthController::class, 'user']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::post('/auth/onboard', [AuthController::class, 'onboard'])->middleware('throttle:10,1');

    // Secure Document Repository
    Route::get('/documents', [DocumentController::class, 'index']);
    Route::get('/documents/{id}/download', [DocumentController::class, 'download']);

    // Admin-only: CMS content management and onboarding approval.
    Route::middleware('admin')->group(function () {
        Route::post('/resources', [CMSController::class, 'store']);
        Route::put('/resources/{id}', [CMSController::class, 'update']);
        Route::delete('/resources/{id}', [CMSController::class, 'destroy']);

        Route::get('/admin/onboard', [AuthController::class, 'getOnboardRequests']);
        Route::post('/admin/onboard/{id}/approve', [AuthController::class, 'approveOnboardRequest']);
    });
});
