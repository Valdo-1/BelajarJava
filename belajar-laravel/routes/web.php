<?php
use App\Http\Controllers\BelajarController;
use App\Http\Controllers\PesertaController;
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
Route::get('peserta', [PesertaController::class, 'index'])->name('peserta.index');
Route::get('peserta/create', [PesertaController::class, 'create'])->name('peserta.create');
Route::post('peserta/store', [PesertaController::class, 'store'])->name('peserta.store');
Route::get('peserta/{id}', [PesertaController::class, 'show'])->name('peserta.show');
Route::get('peserta/{id}/edit', [PesertaController::class, 'edit'])->name('peserta.edit');
Route::put('peserta/{id}/update', [PesertaController::class, 'update'])->name('peserta.update');
Route::delete('peserta/{id}/delete', [PesertaController::class, 'delete'])->name('peserta.delete');