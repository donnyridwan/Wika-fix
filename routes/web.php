<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\LandingController;

use App\Models\User;
use App\Models\Pesanan;

Route::get('/landing', [LandingController::class, 'index'])->name('landing.index');
Route::post('/scrape', [LandingController::class, 'scrapeData'])->name('landing.scrape');
Route::get('/detail/{id}', [LandingController::class, 'detail'])->name('landing.detail');
Route::get('/hasil', [LandingController::class, 'hasil'])->name('landing.hasil');

Route::get('pesanan_add', [PesananController::class, 'create'])->name('pesanan.create');
Route::post('pesanan_store', [PesananController::class, 'store'])->name('pesanan.store');
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::get('pesanan_edit/{id}', [PesananController::class, 'edit'])->name('pesanan.edit');
Route::post('pesanan_update/{id}', [PesananController::class,'update'])->name('pesanan.update');
Route::post('pesanan_delete/{id}', [PesananController::class,'delete'])->name('pesanan.delete');
Route::post('pesanan_tolak/{id}', [PesananController::class,'tolak'])->name('pesanan.tolak');

Route::get('user_add', [UserController::class, 'create'])->name('user.create');
Route::post('user_store', [UserController::class, 'store'])->name('user.store');
Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('user_edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('user_update/{id}', [UserController::class,'update'])->name('user.update');
Route::post('user_delete/{id}', [UserController::class,'delete'])->name('user.delete');

