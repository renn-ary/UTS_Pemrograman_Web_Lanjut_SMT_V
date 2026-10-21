
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

// Route login untuk pengguna yang belum masuk
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'store'])
        ->name('login.store');
});

// Route logout untuk pengguna yang sudah masuk
Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// Route khusus pengguna yang sudah masuk
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('items.index');
    });

    Route::resource('categories', CategoryController::class)
        ->except('show');

    Route::resource('items', ItemController::class)
        ->except('show');
});
