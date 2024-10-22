<?php

use App\Http\Controllers\Admin\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::post('/payments', [PaymentController::class, 'create']);

// Route::get('/test', function () {
//     return response()->json(['message' => 'API is working!']);
// });

// Route::middleware('api')->post('/payments', [PaymentController::class, 'create'])->name('api-payments');
// // Route::post('/webhooks/midtrans', [PaymentController::class, 'webhook']);
Route::middleware('api')->post('/webhooks/midtrans', [PaymentController::class, 'webhook']);
