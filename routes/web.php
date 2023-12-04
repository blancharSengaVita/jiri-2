<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\jiriController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomepageController::class, 'index']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/jiries', [JiriController::class, 'index']);
    Route::get('/jiries/create', [JiriController::class, 'create']);
//    Route::post('/jiries', [JiriController::class, 'store']);
    Route::get('/jiries/{jiri}', [JiriController::class, 'show']);
//    Route::get('/jiries/{jiri}/edit', [JiriController::class, 'edit']);
//    Route::patch('/jiries/{jiri}', [JiriController::class, 'update']);
    Route::delete('/jiries/{jiri}', [JiriController::class, 'destroy']);
});

require __DIR__.'/auth.php';
