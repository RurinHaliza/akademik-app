<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\JadwalAkademikController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\PresensiAkademikController;
use App\Http\Controllers\PdfController;


// TEST ROLE

Route::get('/cek-role', function () {
    return [
        'id' => auth()->user()->id,
        'name' => auth()->user()->name,
        'email' => auth()->user()->email,
        'role' => auth()->user()->role,
    ];
})->middleware('auth');

Route::get('/admin-test', function () {
    return 'Selamat datang Admin';
})->middleware(['auth', 'role:admin']);

// Auth Laravel UI
Auth::routes([
    'register' => false,
]);


// Dashboard
Route::get('/', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


Route::middleware(['auth','role:admin'])->group(function () {

    Route::resource('mahasiswa', MahasiswaController::class);

    Route::resource('dosen', DosenController::class);

    Route::resource('matakuliah', MatakuliahController::class);

    Route::resource('golongan', GolonganController::class);

    Route::resource('ruang', RuangController::class);


});

Route::middleware(['auth','role:admin,dosen'])->group(function () {

    Route::resource('jadwal', JadwalAkademikController::class);

    Route::resource('presensi', PresensiAkademikController::class);

});

Route::middleware(['auth','role:admin,mahasiswa'])->group(function () {

    Route::resource('krs', KrsController::class);

});