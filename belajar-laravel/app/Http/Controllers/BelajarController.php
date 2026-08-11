<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class BelajarController extends Controller

{
    public function index()
    {
        return view('counting');
    }
    public function tambah()
    {
        $nilai1 = 10;
        $nilai2 = 20;
        $hasil = $nilai1 + $nilai2;
        return "Hasil penjumlahan dari $nilai1 + $nilai2 adalah $hasil";
    }
    public function kurang()
    {
        $nilai1 = 10;
        $nilai2 = 20;
        $hasil = $nilai1 - $nilai2;
        return "Hasil pengurangan dari $nilai1 - $nilai2 adalah $hasil";
    }
    public function kali()
    {
        $nilai1 = 10;
        $nilai2 = 20;
        $hasil = $nilai1 * $nilai2;
        return "Hasil perkalian dari $nilai1 * $nilai2 adalah $hasil";
    }
    public function bagi()
    {
        $nilai1 = 10;
        $nilai2 = 20;
        $hasil = $nilai1 / $nilai2;
        return "Hasil pembagian dari $nilai1 / $nilai2 adalah $hasil";
    }
    public function pangkat()
    {
        $nilai1 = 10;
        $nilai2 = 20;
        $hasil = $nilai1 ** $nilai2;
        return "Hasil perpangkatan dari $nilai1 ** $nilai2 adalah $hasil";
    }
    public function akar_pangkat()
    {
        $nilai1 = 10;
        $nilai2 = 20;
        $hasil = $nilai1 ** (1 / $nilai2);
        return "Hasil akar pangkat dari $nilai1 ** (1 / $nilai2) adalah $hasil";
    }
}
    //
