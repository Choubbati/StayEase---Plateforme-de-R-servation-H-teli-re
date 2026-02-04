<?php
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;

Route::get('/hotels/hotels', [HotelController::class, 'index']);
Route::get('/hotels/create', [HotelController::class, 'create']);
Route::post('/hotels/hotels', [HotelController::class, 'store']);
Route::get('/hotels/{hotel}', [HotelController::class, 'edit']);
Route::get('/hotels/{hotel}', [HotelController::class, 'update']);
Route::get('/hotels/{hotel}', [HotelController::class, 'destroy']);




