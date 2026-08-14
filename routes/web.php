<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\MemoryManagementController;
use App\Http\Controllers\Admin\MemberManagementController;
use App\Http\Controllers\Admin\VolunteerProfileManagementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\VolunteerController;

// 1. Rute Publik Dummy Sementara (Akan dibuatkan Controller-nya di Phase berikutnya)
Route::get('/', function () {
    return 'Halaman Beranda Desa Tegalgondo';
})->name('home');

Route::get('/anggota', function () {
    return 'Halaman Anggota';
})->name('members.index');

Route::get('/profil-volunteer', function () {
    return 'Halaman Profil Volunteer';
})->name('volunteer.index');

Route::get('/memories', function () {
    return 'Halaman Galeri Memory';
})->name('memories.index');

// 2. Rute Autentikasi (Guest Only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
    });
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/anggota', [MemberController::class, 'index'])->name('members.index');
    Route::get('/profil-volunteer', [VolunteerController::class, 'index'])->name('volunteer.index');
    Route::get('/memories', [MemoryController::class, 'index'])->name('memories.index');
    Route::get('/memories/{memory}', [MemoryController::class, 'show'])->name('memories.show');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
    
    // 3. Rute Khusus Admin (Dilindungi Middleware Auth & Admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('memories', MemoryManagementController::class)->except(['show']);
    
    // Kelola Anggota
    Route::resource('members', MemberManagementController::class)->except(['show']);

    // Kelola Profil Volunteer
    Route::get('/volunteer-profile', [VolunteerProfileManagementController::class, 'edit'])->name('volunteer-profile.edit');
    Route::put('/volunteer-profile', [VolunteerProfileManagementController::class, 'update'])->name('volunteer-profile.update');
});