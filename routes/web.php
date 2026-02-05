<?php

use App\Http\Controllers\GerantHotelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHotelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;





// Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function() {
//     Route::get("/hotels/pending", [AdminHotelController::class,'pending']->name('admin.hotels.pending'));
//     Route::put("/hotels/{hotel}/aprove",[AdminHotelController::class,'aprove']->name('admin.hotls.aprove'));
//     Route::put("/hotels/{hotel}/reject",[AdminHotelController::class,'reject']->name('admin.hotels.reject'));
// });

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/signup', function (){
    return view('signup');
})->name('register');
Route::post('/signup', [AuthController::class, 'register'])->name('register');

Route::get('/login', function(){
    return view('login');
})->name('login');  
Route::post('/login', [AuthController::class, 'login']);   
Route::post('/signup', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {


    Route::get('/hotels/pending', [AdminHotelController::class, 'pending'])
        ->name('admin.hotels.pending');

    Route::put('/hotels/{hotel}/approve', [AdminHotelController::class, 'approve'])
        ->name('admin.hotels.approve');

    Route::put('/hotels/{hotel}/reject', [AdminHotelController::class, 'reject'])
        ->name('admin.hotels.reject');
});


Route::get('/hotels/hotels', [HotelController::class, 'index']);
Route::get('/hotels/create', [HotelController::class, 'create']);
Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('/hotels/search', [HotelController::class, 'search'])->name('hotels.search');

