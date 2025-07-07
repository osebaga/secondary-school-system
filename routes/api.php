<?php

use App\Http\Controllers\Api\AlumniController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PaymentController;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => 'auth:sanctum'], function() {

        Route::post('v1/payments', [PaymentController::class, 'store_payment']);

    });


Route::prefix('v1')->group(function(){

    Route::get('/alumni/{regNo}', [AlumniController::class, 'alummniRegister']);
    Route::post('/login', [AuthController::class, 'token_generator']);
    Route::get('/mum-courses', [AlumniController::class, 'getCourses']);

});
