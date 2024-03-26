<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');

//INSERT
Route::get('/tambah-pegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insert-data', [EmployeeController::class, 'insertdata'])->name('insertdata');

//EDIT
Route::get('/tampil-data/{id}', [EmployeeController::class, 'tampildata'])->name('tampildata');
Route::post('/update-data/{id}', [EmployeeController::class, 'updatedata'])->name('updatedata');

//DELETE
Route::get('/delete-data/{id}', [EmployeeController::class, 'deletedata'])->name('deletedata');

//EXPORT PDF
Route::get('/exportpdf', [EmployeeController::class, 'exportpdf'])->name('exportpdf');