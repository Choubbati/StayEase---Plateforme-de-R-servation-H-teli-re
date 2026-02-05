<?php
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;


Route::get('/hotels/hotels', [HotelController::class, 'index'])->name("hotels.index");
Route::get('/hotels/create', [HotelController::class, 'create'])->name("hotels.create");
Route::post('/hotels/hotels', [HotelController::class, 'store'])->name('hotels.store');
Route::get('/hotels/{hotel}', [HotelController::class, 'edit'])->name('hotels.edit');
Route::put('/hotels/{hotel}', [HotelController::class, 'update'])->name('hotels.update');
Route::delete('/hotels/{hotel}', [HotelController::class, 'destroy'])->name('hotels.destroy');


