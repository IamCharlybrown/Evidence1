<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeliveryPhotoController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('clients', ClientController::class);
Route::resource('deliveryPhotos', DeliveryPhotoController::class);
Route::resource('orders', OrderController::class);
Route::resource('orderStatus', OrderStatusController::class);
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

