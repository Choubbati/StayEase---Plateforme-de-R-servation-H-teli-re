<?php
use App\Http\Controllers\HotelController;
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
=======
});
Route::post('/signup', [AuthController::class, 'register'])->name('register');
Route::get('/hotels/hotels', [HotelController::class, 'index']);
Route::get('/hotels/create', [HotelController::class, 'create']);


>>>>>>> e731c1449a51151b5301163f2d5d7e5475f81ffe
