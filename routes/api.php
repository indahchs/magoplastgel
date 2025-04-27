<?php

use App\Http\Controllers\User\CheckoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(CheckoutController::class)->group(function() {
    Route::post('/v1/webhook/midtrans',  'webhookPayment')->name('user.payment-status');
    // Route::get('/v1/payment/status/{statusParameter}', 'notification');

});

