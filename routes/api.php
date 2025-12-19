<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProgramController;
use App\Http\Controllers\API\DonationController;
use App\Http\Controllers\API\MustahikController;
use App\Http\Controllers\API\PenyaluranController;
use App\Http\Controllers\API\ProgramWalletController;
use App\Http\Controllers\API\MasjidWalletController;
use App\Http\Controllers\API\NotificationsController;
use App\Http\Controllers\API\MidtransController;
use Illuminate\Support\Facades\Route;

# =====================
# PUBLIC ROUTES
# =====================

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Public access untuk menampilkan program / donasi tanpa login
Route::get('programs', [ProgramController::class, 'index']);
Route::get('programs/{id}', [ProgramController::class, 'show']);
Route::get('donations', [DonationController::class, 'index']);
Route::get('donations/{id}', [DonationController::class, 'show']);

# =====================
# PROTECTED ROUTES (auth:sanctum)
# =====================
Route::middleware('auth:sanctum')->group(function () {

    // Auth
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('profile', [AuthController::class, 'profile']);

    // Actions yang hanya bisa dilakukan user login
    Route::apiResource('programs', ProgramController::class)->except(['index','show']);
    Route::apiResource('donations', DonationController::class)->except(['index','show']);
    Route::apiResource('penyaluran', PenyaluranController::class);
    Route::apiResource('mustahik', MustahikController::class);

    // Wallets (sensitif)
    Route::apiResource('program-wallet', ProgramWalletController::class)->only(['index','show','update']);
    Route::apiResource('masjid-wallet', MasjidWalletController::class)->only(['show','update']);

    // Notifications
    Route::apiResource('notifications', NotificationsController::class)->only(['index','show']);
    Route::patch('notifications/{id}/read', [NotificationsController::class, 'markAsRead']);

    // Midtrans Payment
    Route::get('donations/{donation_id}/midtrans', [MidtransController::class, 'createPayment']);

    # =====================
    # ADMIN-ONLY ROUTES
    # =====================
    Route::middleware('role:admin')->group(function () {
        Route::apiResource('users', UserController::class);
    });

});
