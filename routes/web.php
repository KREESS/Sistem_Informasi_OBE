<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AdminController;

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



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Group untuk Dosen
Route::group(['middleware' => ['auth', 'role:dosen']], function () {
    Route::get('/dosen/dashboard', function () {
        return view('dosen.dashboard'); // Pastikan view untuk dosen dashboard tersedia
    })->name('dosen.dashboard');
});




// Group untuk Admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); // Buat view dashboard untuk admin
    })->name('admin.dashboard');
});
