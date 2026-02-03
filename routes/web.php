<?php
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;

Route::get('/hotels/hotels', [HotelController::class, 'index']);
Route::get('/hotels/create', [HotelController::class, 'create']);


