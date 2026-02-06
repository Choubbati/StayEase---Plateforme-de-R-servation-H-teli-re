<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GerantHotelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHotelController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;


// Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function() {
//     Route::get("/hotels/pending", [AdminHotelController::class,'pending']->name('admin.hotels.pending'));
//     Route::put("/hotels/{hotel}/aprove",[AdminHotelController::class,'aprove']->name('admin.hotls.aprove'));
//     Route::put("/hotels/{hotel}/reject",[AdminHotelController::class,'reject']->name('admin.hotels.reject'));
// });

//Route::get('/', function () {
//    return view('home');
//})->name('home');

Route::get('/', [UserController::class, 'index'])->name('home');

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


/* hotels crud for gerant */

Route::get('/hotels/hotels', [GerantHotelController::class, 'index'])->name("hotels.hotels");
Route::get('/hotels/show/{hotel}', [GerantHotelController::class, 'show'])->name("hotels.detail");
Route::get('/hotels/create', [GerantHotelController::class, 'create'])->name('hotels.create');
Route::post('/hotels/hotels', [GerantHotelController::class, 'store'])->name('hotels.store');
Route::get('/hotels/{hotel}', [GerantHotelController::class, 'edit'])->name('hotels.edit');
Route::put('/hotels/{hotel}', [GerantHotelController::class, 'update'])->name('hotels.update');
Route::delete('/hotels/{hotel}', [GerantHotelController::class, 'destroy'])->name('hotels.destroy');

Route::get('/admin/adminDashboard', [AdminController::class,'index'])->middleware(['auth'])->name('admin.dashboard');
Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile');
