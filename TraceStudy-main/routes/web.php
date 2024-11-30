<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LokerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','dosen')->group(function(){
    Route::get('/dosen/dashboard',[DosenController::class,'index'])->name('dosen.index');
    Route::get('/dosen/alumni', [DosenController::class, 'alumni'])->name('dosen.alumni');
    Route::get('/dosen/alumni/create', [DosenController::class, 'create'])->name('dosen.alumni.create');
    Route::post('/dosen/alumni', [DosenController::class, 'store'])->name('dosen.alumni.store');
    Route::get('/dosen/agenda', [DosenController::class, 'agenda'])->name('dosen.agenda');
    Route::get('/dosen/institusi', [DosenController::class, 'institusi'])->name('dosen.institusi');
    Route::get('/dosen/institusi/create', [DosenController::class, 'createInstitusi'])->name('dosen.institusi.create');
    Route::post('/dosen/institusi', [DosenController::class, 'storeInstitusi'])->name('dosen.institusi.store');
    Route::get('/dosen/institusi/{id}', [DosenController::class, 'showInstitusi'])->name('dosen.institusi.show');
    Route::delete('/dosen/institusi/{id}', [DosenController::class, 'destroyInstitusi'])->name('dosen.institusi.destroy');
    
    Route::get('/dosen/loker', [LokerController::class, 'index'])->name('dosen.loker');
    Route::get('/dosen/loker/create', [LokerController::class, 'create'])->name('dosen.loker.create');
    Route::post('/dosen/loker', [LokerController::class, 'store'])->name('dosen.loker.store');
    Route::get('/dosen/loker/{id}', [LokerController::class, 'show'])->name('dosen.loker.show');
    Route::get('/dosen/loker/{id}/edit', [LokerController::class, 'edit'])->name('loker.edit');
    Route::put('/dosen/loker/{id}', [LokerController::class, 'update'])->name('loker.update');
    Route::delete('/dosen/loker/{id}', [LokerController::class, 'destroy'])->name('loker.destroy');
    
    Route::delete('/dosen/alumni/{id}', [DosenController::class, 'destroy'])->name('dosen.alumni.destroy');
    Route::get('/dosen/alumni/{id}', [DosenController::class, 'show'])->name('dosen.alumni.show');
    Route::post('/dosen/alumni/{id}', [DosenController::class, 'update'])->name('dosen.alumni.update');
    Route::get('/dosen/institusi/{id}/edit', [DosenController::class, 'editInstitusi'])->name('dosen.institusi.edit');
    Route::put('/dosen/institusi/{id}', [DosenController::class, 'updateInstitusi'])->name('dosen.institusi.update');
});

Route::middleware('auth','mahasiswa')->group(function(){
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/institusi', [MahasiswaController::class, 'institusi'])->name('mahasiswa.institusi');
    Route::get('/mahasiswa/alumni', [MahasiswaController::class, 'alumni'])->name('mahasiswa.alumni');
    Route::get('/mahasiswa/loker', [MahasiswaController::class, 'loker'])->name('mahasiswa.loker');
    Route::get('/mahasiswa/alumni/{id}', [MahasiswaController::class, 'showAlumni'])->name('mahasiswa.alumni.show');
    Route::get('/mahasiswa/institusi/{id}', [MahasiswaController::class, 'showInstitusi'])->name('mahasiswa.institusi.show');
    Route::get('/mahasiswa/loker/{id}', [MahasiswaController::class, 'showLoker'])->name('mahasiswa.loker.show');
});

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Dosen Registration Routes
Route::get('/register/dosen', [RegisteredUserController::class, 'createDosen'])->name('register.dosen');
Route::post('/register/dosen', [RegisteredUserController::class, 'storeDosen'])->name('register.dosen.store');

// Mahasiswa Registration Routes
Route::get('/register/mahasiswa', [RegisteredUserController::class, 'createMahasiswa'])->name('register.mahasiswa');
Route::post('/register/mahasiswa', [RegisteredUserController::class, 'storeMahasiswa'])->name('register.mahasiswa.store');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/login/dosen', [LoginController::class, 'showDosenLoginForm'])->name('login.dosen');
Route::post('/login/dosen', [LoginController::class, 'dosenLogin']);

Route::get('/login/mahasiswa', [LoginController::class, 'showMahasiswaLoginForm'])->name('login.mahasiswa');
Route::post('/login/mahasiswa', [LoginController::class, 'mahasiswaLogin']);

require __DIR__.'/auth.php';
