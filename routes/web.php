<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GerantHotelController;
use App\Http\Controllers\HotelController;
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
    Route::get('/dashboard', function () {
        return view('admin.adminDashboard');
    })->name('admin.dashboard');

    Route::get('/hotels/validation', function () {
        return view('admin.hotels.validation');
    })->name('admin.hotels.validation');

    Route::get('/gerants', function () {
        return view('admin.gerants.index');
    })->name('admin.gerants.index');

    Route::get('/users', function () {
        return view('admin.users.index');
    })->name('admin.users.index');

    Route::get('/roles', function () {
        return view('admin.roles.index');
    })->name('admin.roles.index');

    Route::get('/hotels/pending', [AdminHotelController::class, 'pending'])
        ->name('admin.hotels.pending');

    Route::put('/hotels/{hotel}/approve', [AdminHotelController::class, 'approve'])
        ->name('admin.hotels.approve');

    Route::put('/hotels/{hotel}/reject', [AdminHotelController::class, 'reject'])
        ->name('admin.hotels.reject');
});


/* hotels crud for gerant */
//Route:middleware(['auth', 'role:gerant'])->group( function (){
//Route::get('/hh', function(){return view('hotels.dashbord');});
Route::get('/hotels/hotels', [GerantHotelController::class, 'index'])->name("hotels.hotels");
Route::get('/hotels/show/{hotel}', [GerantHotelController::class, 'show'])->name("hotels.detail");
Route::get('/hotels/create', [GerantHotelController::class, 'create'])->name('hotels.create');
Route::post('/hotels/hotels', [GerantHotelController::class, 'store'])->name('hotels.store');
Route::get('/hotels/{hotel}', [GerantHotelController::class, 'edit'])->name('hotels.edit');
Route::put('/hotels/{hotel}', [GerantHotelController::class, 'update'])->name('hotels.update');
Route::delete('/hotels/{hotel}', [GerantHotelController::class, 'destroy'])->name('hotels.destroy');
//});

Route::get('/admin/adminDashboard', [AdminController::class,'index'])->middleware('role:1')->name('admin.dashboard');
Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile');
// // Route::get('/admin/adminGerants', function (){
// //     return view('admin.adminGerants');
// })->name('gestionGerants');


// Route::get('/hotel/manage', function () {
//     return view('gerant.dashboard');
// })->middleware('role:1,2');