<?php

use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PropertieController;
use App\Http\Controllers\GerantHotelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHotelController;
use App\Http\Controllers\ChambreController;



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

Route::resource('tags', TagController::class);
Route::resource('properties', PropertieController::class);
Route::resource('chambres', ChambreController::class);
Route::prefix('admin')->group(function () {


    Route::get('/hotels/pending', [AdminHotelController::class, 'pending'])
        ->name('admin.hotels.pending');

    Route::put('/hotels/{hotel}/approve', [AdminHotelController::class, 'approve'])
        ->name('admin.hotels.approve');

    Route::put('/hotels/{hotel}/reject', [AdminHotelController::class, 'reject'])
        ->name('admin.hotels.reject');
});


/* hotels crud for gerant */

Route::get('/hotels/hotels', [GerantHotelController::class, 'index'])->middleware('role:2')->name("hotels.hotels");
Route::get('/hotels/show/{hotel}', [GerantHotelController::class, 'show'])->name("hotels.detail");
Route::get('/hotels/create', [GerantHotelController::class, 'create'])->middleware('role:2')->name('hotels.create');
Route::post('/hotels/hotels', [GerantHotelController::class, 'store'])->middleware('role:2')->name('hotels.store');
Route::get('/hotels/{hotel}', [GerantHotelController::class, 'edit'])->middleware('role:2')->name('hotels.edit');
Route::put('/hotels/{hotel}', [GerantHotelController::class, 'update'])->middleware('role:2')->name('hotels.update');
Route::delete('/hotels/{hotel}', [GerantHotelController::class, 'destroy'])->middleware('role:2')->name('hotels.destroy');

/* categories */
Route::get('admin/categories/index', [CategorieController::class, 'index'])->middleware('role:2')->name('categories.index');
Route::get('admin/categories/create', [CategorieController::class, 'create'])->middleware('role:2')->name('categories.create');
Route::post('admin/categories/index', [CategorieController::class, 'store'])->middleware('role:2')->name('categories.store');
Route::get('admin/categories/{categorie}', [CategorieController::class, 'edit'])->middleware('role:2')->name('categories.edit');
Route::put('admin/categories/{categorie}', [CategorieController::class, 'update'])->middleware('role:2')->name('categories.update');
Route::delete('admin/categories/{categorie}', [CategorieController::class, 'destroy'])->middleware('role:2')->name('categories.delete');
Route::get('/admin/adminDashboard', [AdminHotelController::class,'pending'])
    ->middleware('role:1')
    ->name('admin.dashboard');
Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile');
/* classer les chambres par categorie */
//Route::post('hotels/hotels', [ChambreController::class, 'index'])->middleware('role:2')->name('hotels.filter');


Route::get('/admin/adminGerants', function (){
    return view('admin.adminGerants');
})->name('gestionGerants');


Route::get('/hotel/manage', function () {
    return view('gerant.dashboard');
})->middleware('role:1,2');

Route::middleware('auth')->group(function () {
    Route::post('/reservations', [ReservationController::class, 'store'])
        ->name('reservations.store');
});
