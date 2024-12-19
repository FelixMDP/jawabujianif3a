<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
// Route::get('/', function () {
//     return view('files.index');
// });
Route::get('/files',
[App\Http\Controllers\FileController::class, 'index'])->name('files.index');
Route::get('/files/create',
[App\Http\Controllers\FileController::class, 'create'])->name('files.create');
Route::post('/files/store',
[App\Http\Controllers\FileController::class, 'store'])->name('files.store');
Route::get('/files/{id}/download', [FileController::class, 'download'])->name('files.download');

