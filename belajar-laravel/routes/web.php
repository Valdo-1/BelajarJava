<?php
use App\Http\Controllers\BelajarController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\SettingController;
use App\Http\Controllers\OrderController;


route::get('/', [LoginController::class, 'login'])->name('login');
route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'actionLogin'])->name('actionLogin');



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

//middleware untuk login
Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::resource('product', ProductController::class); 
    Route::resource('peserta', PesertaController::class);
    Route::resource('role', RoleController::class); 
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::get('/setting/{id}/edit', [SettingController::class, 'edit'])->name('setting.edit');
    Route::put('/setting/{id}', [SettingController::class, 'update'])->name('setting.update');
    Route::resource('order', OrderController::class); 
    Route::get('order/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
    Route::put('order/{id}', [OrderController::class, 'update'])->name('order.update');
    Route::delete('order/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
});


// ROLE
