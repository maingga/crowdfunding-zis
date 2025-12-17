<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ProgramController;
use App\Http\Controllers\API\DonationController;
use App\Http\Controllers\API\MustahikController;
use App\Http\Controllers\API\PenyaluranController;
use App\Http\Controllers\API\ProgramWalletController;
use App\Http\Controllers\API\MasjidWalletController;
use App\Http\Controllers\API\NotificationsController;
use App\Http\Controllers\API\MidtransController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);
Route::apiResource('programs', ProgramController::class);
Route::apiResource('donations', DonationController::class);
Route::apiResource('mustahik', MustahikController::class);
Route::apiResource('penyaluran', PenyaluranController::class);
Route::apiResource('program-wallet', ProgramWalletController::class)->only(['index','show','update']);
Route::apiResource('masjid-wallet', MasjidWalletController::class)->only(['show','update']);
Route::apiResource('notifications', NotificationsController::class)->only(['index','show']);
Route::patch('notifications/{id}/read', [NotificationsController::class,'markAsRead']);

Route::get('donations/{donation_id}/midtrans', [MidtransController::class,'createPayment']);