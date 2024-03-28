<?php

use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $jumlahPegawai = Employee::count();
    $jumlahPegawaiCowo = Employee::where('jenisKelamin', 'cowo')->count();
    $jumlahPegawaiCewe = Employee::where('jenisKelamin', 'cewe')->count();
    return view('welcome', compact('jumlahPegawai', 'jumlahPegawaiCowo', 'jumlahPegawaiCewe'));
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

//EXPORT EXCEL
Route::get('/exportexcel', [EmployeeController::class, 'exportexcel'])->name('exportexcel');