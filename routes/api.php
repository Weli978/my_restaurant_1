<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OrderdetailsController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResources([
        'categories' => CategoryController::class,
        'menus' => MenuController::class,
        'orders' => OrderController::class,
        'reviews' => ReviewController::class,
        'payments' => PaymentController::class,
        'orderdetails' => OrderdetailsController::class,
    ]);

    Route::get('/getOrderDetails/{id}', [OrderController::class,'getOrderdetails']);
// });
