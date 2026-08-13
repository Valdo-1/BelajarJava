<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Role;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPeserta = Peserta::count();
        $totalRole = Role::count();
        $totalCategory = Category::count();
        // Cek jika tabel products ada dan memiliki model
        $totalProduk = class_exists(Product::class) ? Product::count() : 0;
        
        // Asumsi belum ada tabel pesanan
        $totalPesanan = 0; 

        return view('dashboard.index', compact('totalPeserta', 'totalRole', 'totalCategory', 'totalProduk', 'totalPesanan'));
    }
}
