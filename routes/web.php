<?php
use App\Http\Controllers\GerantHotelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

/* hotels crud for gerant */
//Route:middleware(['auth', 'role:gerant'])->group( function (){

    Route::get('/hotels/hotels', [GerantHotelController::class, 'index'])->name("hotels.hotels");
    Route::get('/hotels/create', [GerantHotelController::class, 'create'])->name('hotels.create');
    Route::post('/hotels/hotels', [GerantHotelController::class, 'store'])->name('hotels.store');
    Route::get('/hotels/{hotel}', [GerantHotelController::class, 'edit'])->name('hotels.edit');
    Route::put('/hotels/{hotel}', [GerantHotelController::class, 'update'])->name('hotels.update');
    Route::delete('/hotels/{hotel}', [GerantHotelController::class, 'destroy'])->name('hotels.destroy');
//});




