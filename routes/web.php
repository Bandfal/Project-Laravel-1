<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halaman_2', [HomeController::class, "Halaman_2"]);

Route::get('/home', [HomeController::class, "home"]) -> name('home');

Route::get('/admin', [HomeController::class, "admin"]) -> name('admin');

Route::get('/dashboard', [HomeController::class, "dashboard"]) -> name('dashboard');

Route::get('/about', [AboutController::class, "index"]) -> name('about');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Siswa
    Route::get('/master_siswa', [SiswaController::class, "master_siswa"]) -> name('master_siswa');
    Route::get('/tambah_siswa', [SiswaController::class, "tambah_siswa"]) -> name('tambah_siswa');
    Route::post('/tambah_siswa_proses', [SiswaController::class, "tambah_siswa_proses"]) -> name('tambah_siswa_proses');
    Route::get('/delete_siswa/{id}', [SiswaController::class, "delete_siswa"]) -> name('siswa.destroy');
    Route::get('/edit_siswa/{id}', [SiswaController::class, "edit"]) -> name('siswa.edit');
    Route::post('/edit_siswa_proses/{id}', [SiswaController::class, "edit_siswa_proses"]) -> name('siswa.edit_proses');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    // Project
    Route::resource('/master_project', ProjectController::class);
    Route::get('/master_project/{id}/create', [ProjectController::class, "add"]) 
    -> name('master_project.add');
});

Route::middleware(['auth'])->group(function () {
    // Siswa
    Route::get('/master_siswa', [SiswaController::class, "master_siswa"]) -> name('master_siswa');
    // Project
    Route::resource('/master_project', ProjectController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});