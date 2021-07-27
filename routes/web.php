<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', [AdminController::class, 'admin'])
    ->name('admin.dashboard')
    ->middleware(['auth', 'role:admin|pengurus']);
Route::get('/admin/detail/{id}', [AdminController::class, 'detail'])
    ->name('admin.detail.anggota')
    ->middleware(['auth', 'role:admin|pengurus']);
Route::get('/admin/tambah', [AdminController::class, 'tambah'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.tambah.anggota');
Route::post('/admin/anggota/tambah', [AdminController::class, 'prosesTambah'])
    ->name('admin.prosesTambah')
    ->middleware(['auth', 'role:admin']);
Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])
    ->name('admin.edit.anggota')
    ->middleware(['auth', 'role:admin:pengurus']);
Route::post('/admin/anggota/edit/{id}', [AdminController::class, 'prosesEdit'])
    ->name('admin.prosesEdit')
    ->middleware(['auth', 'role:admin|pengurus']);
Route::get('/admin/anggota/hapus/{id}', [AdminController::class, 'hapus'])
    ->name('admin.prosesHapus')
    ->middleware(['auth', 'role:admin']);


Route::get('/user/profile/{id}', [PenggunaController::class, 'index'])->name('user.dashboard');
Route::get('/user/update/{id}', [PenggunaController::class, 'updateForm'])->name('user.update');
Route::post('/user/update-data/{id}', [PenggunaController::class, 'updateData'])->name('user.proses.update');

Route::get('/get-all-anggota', [EmpController::class, 'getAllAnggota']);
Route::get('/download-pdf', [EmpController::class, 'downloadPDF']);

require __DIR__ . '/auth.php';
