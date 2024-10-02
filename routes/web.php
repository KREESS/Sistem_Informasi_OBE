<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlController;
use App\Http\Controllers\CplController;
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
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Route Untuk Register mahasiswa, dosen, dan ketua kbk
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);


    // Rute untuk view table
    Route::get('/show&edit', [RegisterController::class, 'showEdit'])->name('edit');
    Route::get('/get-users', [RegisterController::class, 'getUsers'])->name('api.get_users');

    // Rute Untuk Edit & delete manage data user
    Route::get('/admin/edit-user-role/{id}', [RegisterController::class, 'editUserRole'])->name('admin.edit_user_role');
    Route::put('/admin/update-user-role/{id}', [RegisterController::class, 'updateUserRole'])->name('admin.update_user_role');
    Route::delete('/admin/users/{id}', [RegisterController::class, 'delete'])->name('admin.delete_user');

    // Rute Untuk Buat Baru PL
    Route::get('/tambah-PL', [PlController::class, 'showTambahPl'])->name('pl');
    Route::post('/tambah-PL', [PlController::class, 'store'])->name('pl.store');

    // Rute Untuk Edit & Delete PL & Relasi Ke CPL
    // Rute untuk menampilkan semua PL
    Route::get('/show-PL', [PlController::class, 'showPl'])->name('manage.pl');
    // Rute untuk mengedit PL
    Route::get('/edit-PL/{id}', [PlController::class, 'editPl'])->name('edit.pl');
    // Rute untuk memperbarui PL
    Route::post('/update-PL/{id}', [PlController::class, 'updatePl'])->name('update.pl');
    // Rute untuk menghapus PL
    Route::delete('/delete-PL/{id}', [PlController::class, 'deletePl'])->name('delete.pl');

    // Rute Untuk Edit & Delete CPL & Relasi Ke MATA KULIAH
    Route::get('/tambah-cpl', [CplController::class, 'index'])->name('cpl');
    Route::get('/show-cpl', [CplController::class, 'showCpl'])->name('manage.cpl');
});
