<?php
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHotelController;


Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function() {
//     Route::get("/hotels/pending", [AdminHotelController::class,'pending']->name('admin.hotels.pending'));
//     Route::put("/hotels/{hotel}/aprove",[AdminHotelController::class,'aprove']->name('admin.hotls.aprove'));
//     Route::put("/hotels/{hotel}/reject",[AdminHotelController::class,'reject']->name('admin.hotels.reject'));
// });

Route::get('/', function () {
    return view('welcome');
});

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

