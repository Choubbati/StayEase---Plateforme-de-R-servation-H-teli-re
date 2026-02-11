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

Route::resource('tags', controller: TagController::class);
Route::resource('properties', PropertieController::class);
Route::resource('chambres', ChambreController::class);
Route::prefix('admin')->group(function () {
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.adminDashboard');
    })->name('admin.dashboard');

    Route::get('/hotels/validation', function () {
        return view('admin.hotels.validation');
    })->name('admin.hotels.validation');

    Route::get('/gerants', function () {
        return view('admin.gerants.index');
    })->name('admin.gerants.index');

    Route::get('/users', [AdminController::class, 'showUsers'])->name('admin.users.index');
    Route::delete('/users/{user}', [AdminController::class, 'banUser'])->name('admin.users.ban');

    Route::resource('tags', TagController::class);
    Route::resource('properties', PropertieController::class);
    Route::resource('chambres', controller: ChambreController::class);
    Route::get('chambres/filter', [ChambreController::class, 'filter'])->name('chambres.filter');

});
    Route::prefix('admin')->group(function () {

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
});

Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');

/* hotels crud for gerant */
Route::get('/hotels/hotels', [GerantHotelController::class, 'index'])->middleware('role:2')->name("hotels.hotels");
Route::get('/hotels/show/{hotel}', [GerantHotelController::class, 'show'])->name("hotels.detail");
Route::get('/hotels/create', [GerantHotelController::class, 'create'])->middleware('role:2')->name('hotels.create');
Route::post('/hotels/hotels', [GerantHotelController::class, 'store'])->middleware('role:2')->name('hotels.store');
Route::get('/hotels/{hotel}', [GerantHotelController::class, 'edit'])->middleware('role:2')->name('hotels.edit');
Route::put('/hotels/{hotel}', [GerantHotelController::class, 'update'])->middleware('role:2')->name('hotels.update');
Route::delete('/hotels/{hotel}', [GerantHotelController::class, 'destroy'])->middleware('role:2')->name('hotels.destroy');

/* categories */
Route::get('categories/index', [CategorieController::class, 'index'])->middleware('role:2')->name('categories.index');
Route::get('categories/create', [CategorieController::class, 'create'])->middleware('role:2')->name('categories.create');
Route::post('categories/index', [CategorieController::class, 'store'])->middleware('role:2')->name('categories.store');
Route::get('categories/{categorie}', [CategorieController::class, 'edit'])->middleware('role:2')->name('categories.edit');
Route::put('categories/{categorie}', [CategorieController::class, 'update'])->middleware('role:2')->name('categories.update');
Route::delete('categories/{categorie}', [CategorieController::class, 'destroy'])->middleware('role:2')->name('categories.delete');


Route::get('/admin/adminDashboard', [AdminController::class,'index'])->middleware('role:1')->name('admin.dashboard');
Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile');
