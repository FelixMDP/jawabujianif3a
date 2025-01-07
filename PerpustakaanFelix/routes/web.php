<?php

use App\Http\Controllers\anggotaController;
use App\Http\Controllers\bukuController;
use App\Http\Controllers\peminjamanController;
use Illuminate\Support\Facades\Route;




Route::get("/", [peminjamanController::class,"index"])->name("main");
Route::post("/confirm", [peminjamanController::class,"store"])->name("confirm");

Route::get("/bukuview", [bukuController::class,"index"])->name("bukuview");
Route::get('/bukuadd', [bukuController::class, 'add'])->name('bukuadd');
Route::post('/bukuaddsubmit', [bukuController::class, 'submitBuku'])->name('bukusubmited');
Route::get('/bukuedit/{idbuku}', [bukuController::class,'edit'])->name('bukuedit');
Route::post('/bukuupdate/{idbuku}', [bukuController::class,'update'])->name('bukuupdate');
Route::post('/bukudelete/{idbuku}', [bukuController::class,'delete'])->name('bukudelete');



Route::get("/anggotaview", [anggotaController::class,"index"])->name("anggotaview");
Route::get('/anggotaadd', [anggotaController::class, 'add'])->name('anggotaadd');
Route::post('/anggotasubmitadd', [anggotaController::class, 'submitAnggota'])->name('anggotasubmited');
Route::get('/anggotaedit/{idanggota}', [anggotaController::class,'edit'])->name('anggotaedit');
Route::post('/anggotaupdate/{idanggota}', [anggotaController::class,'update'])->name('anggotaupdate');
Route::post('/anggotadelete/{idanggota}', [anggotaController::class,'delete'])->name('anggotadelete');


Route::get("/detailview", [peminjamanController::class,"index2"])->name("detailview");
Route::post('/detaildelete/{nopinjam}', [peminjamanController::class,'delete'])->name('detaildelete');
Route::get('/detailedit/{nopinjam}', [peminjamanController::class,'edit'])->name('detailedit');
Route::post('/detailupdate/{nopinjam}', [peminjamanController::class,'update'])->name('detailupdate');