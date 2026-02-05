<?php
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});

Route::get('/signup', function (){
    return view('signup');
})->name('register');
Route::get('/login', function (){
    return view('login');
});
Route::post('/signup', [AuthController::class, 'register'])->name('register');
Route::get('/hotels/hotels', [HotelController::class, 'index']);
Route::get('/hotels/create', [HotelController::class, 'create']);
Route::post('/hotels/hotels', [HotelController::class, 'store']);
Route::get('/hotels/{hotel}', [HotelController::class, 'edit']);
Route::get('/hotels/{hotel}', [HotelController::class, 'update']);
Route::get('/hotels/{hotel}', [HotelController::class, 'destroy']);




