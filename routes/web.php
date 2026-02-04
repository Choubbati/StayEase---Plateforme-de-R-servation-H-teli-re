<?php

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