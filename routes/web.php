<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Auth;
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
    if (Auth::user()->hasRole('admin') or Auth::user()->hasRole('pengurus')) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('anggota.index');
    }
})->middleware(['auth', 'role:admin|pengurus|anggota'])->name('dashboard');

Route::get('/dashboard', function () {
    if (Auth::user()->hasRole('admin') or Auth::user()->hasRole('pengurus')) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('anggota.index');
    }
});

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
    ->middleware(['auth', 'role:admin|pengurus']);
Route::post('/admin/edit/{id}', [AdminController::class, 'prosesEdit'])
    ->name('admin.prosesEdit')
    ->middleware(['auth', 'role:admin|pengurus']);

Route::get('/admin/edit-dua/{id}', [AdminController::class, 'editDua'])
    ->name('admin.edit.dua.anggota')
    ->middleware(['auth', 'role:admin|pengurus']);
Route::post('/admin/edit-dua/{id}', [AdminController::class, 'prosesEditDua'])
    ->name('admin.prosesEditDua')
    ->middleware(['auth', 'role:admin|pengurus']);

Route::get('/admin/edit-tiga/{id}', [AdminController::class, 'editTiga'])
    ->name('admin.edit.tiga.anggota')
    ->middleware(['auth', 'role:admin|pengurus']);
Route::post('/admin/edit-tiga/{id}', [AdminController::class, 'prosesEditTiga'])
    ->name('admin.prosesEditTiga')
    ->middleware(['auth', 'role:admin|pengurus']);

Route::get('/admin/anggota/hapus/{id}', [AdminController::class, 'hapus'])
    ->name('admin.prosesHapus')
    ->middleware(['auth', 'role:admin']);

Route::get('/admin/pengguna', [AdminController::class, 'pengguna'])
    ->name('admin.pengguna')
    ->middleware(['auth', 'role:admin']);

Route::get('/admin/tambah-pengurus', [AdminController::class, 'tambahPengurus'])
    ->name('admin.tambah.pengurus')
    ->middleware(['auth', 'role:admin']);
Route::post('/admin/tambah-pengurus', [AdminController::class, 'prosesTambahPengurus'])
    ->name('admin.prosesTambahPengurus')
    ->middleware(['auth', 'role:admin']);

Route::get('/admin/pengurus/hapus/{id}', [AdminController::class, 'hapusPengurus'])
    ->name('admin.prosesHapusPengurus')
    ->middleware(['auth', 'role:admin']);


// Anggota
Route::get('/anggota', [AnggotaController::class, 'index'])
    ->name('anggota.index')
    ->middleware(['auth', 'role:anggota']);

Route::get('/edit-profil-biodata', [AnggotaController::class, 'editHalamanSatu'])
    ->name('anggota.edit')
    ->middleware(['auth', 'role:anggota']);
Route::post('/edit-profil-biodata', [AnggotaController::class, 'postEditHalamanSatu'])
    ->name('anggota.edit.post')
    ->middleware(['auth', 'role:anggota']);

Route::get('/edit-profil-tentang', [AnggotaController::class, 'editHalamanDua'])
    ->name('anggota.edit.kedua')
    ->middleware(['auth', 'role:anggota']);
Route::post('/edit-profil-tentang', [AnggotaController::class, 'postEditHalamanDua'])
    ->name('anggota.edit.post.kedua')
    ->middleware(['auth', 'role:anggota']);

Route::get('/edit-profil-kontak', [AnggotaController::class, 'editHalamanTiga'])
    ->name('anggota.edit.ketiga')
    ->middleware(['auth', 'role:anggota']);
Route::post('/edit-profil-kontak', [AnggotaController::class, 'postEditHalamanTiga'])
    ->name('anggota.edit.post.ketiga')
    ->middleware(['auth', 'role:anggota']);

Route::get('/anggota-change-password', [AnggotaController::class, 'changePassword'])
    ->name('anggota.change.password')
    ->middleware(['auth', 'role:anggota|admin']);
Route::post('/anggota-change-password', [AnggotaController::class, 'change'])
    ->name('anggota.change.password.post')
    ->middleware(['auth', 'role:anggota|admin']);


// Route::get('/template-pdf', [EmpController::class, 'index']);
Route::get('/download-pdf', [EmpController::class, 'downloadPDF'])->name('convert.pdf');
Route::get('/download-pdf/{id}', [EmpController::class, 'downloadPDFAdmin'])->name('admin.convert.pdf');

require __DIR__ . '/auth.php';
