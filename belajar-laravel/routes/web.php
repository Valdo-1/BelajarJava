<?php
use App\Http\Controllers\BelajarController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    
});
//method : GET, POST, PUT, PATCH, DELETE
//GET : lihat dan baca
//POST : mengirim data dari form, aksinya :insert
//PUT : mengubah data, aksinya : update
//delete : menghapus data, akisnya : delete
//path : /mengirim data dari form, aksinya update
Route::get('salam', [BelajarController::class, 'greeting']);
Route::get('counting', [BelajarController::class, 'index']);
Route::get('hitung-tambah', [BelajarController::class, 'tambah']); 
route::get('hitung-kurang', [BelajarController::class, 'kurang']);
Route::get('hitung-kali', [BelajarController::class, 'kali']);
Route::get('hitung-bagi', [BelajarController::class, 'bagi']);
Route::get('hitung-pangkat', [BelajarController::class, 'pangkat']);
Route::get('hitung-akar-pangkat', [BelajarController::class, 'akar_pangkat']);
Route::resource('peserta', PesertaController::class);

// ROLE
Route::resource('role', RoleController::class);
