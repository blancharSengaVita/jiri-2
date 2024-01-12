<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactHomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\jiriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TokenController;
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

Route::get('/mail', [MailController::class, 'index']);

Route::post('/mail', [MailController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('token')->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'store'])->middleware('token')->name('dashboard');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/jiries', [JiriController::class, 'index'])->name('jiries');
    Route::get('/jiries/create', [JiriController::class, 'create']);
    Route::get('/jiries/{jiri}', [JiriController::class, 'show']);
    Route::delete('/jiries/{jiri}', [JiriController::class, 'destroy']);

    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
    Route::get('/contacts/create', [ContactController::class, 'create']);
    Route::get('/contacts/{contact}', [ContactController::class, 'show']);
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy']);

    Route::get('/projets', [ProjectController::class, 'index'])->name('projects');
    Route::get('/projets/create', [ProjectController::class, 'create']);
    Route::get('/projets/{project}', [ProjectController::class, 'show']);
    Route::delete('/projets/{project}', [ProjectController::class, 'destroy']);
});


require __DIR__ . '/auth.php';
