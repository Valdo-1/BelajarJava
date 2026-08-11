<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;

class PesertaController extends Controller
{
    public function index()
    {
        $pesertas = Peserta::get();
        return view('index', compact('pesertas'));
    }
    public function create()
    {
        return view('create');
    }
    //Post
    public function store(Request $request)
    {
        $nama = $request->nama;
        $umur = $request->umur;
        $alamat = $request->alamat;
        return "Nama anda Adalah $nama, Umur anda $umur, Alamat anda $alamat";
    }
    //GET
    public function show($id)
    {
        return "Tampil data peserta dengan ID $id";
    }
    //GET Edit
    public function edit($id)
    {
        return "Form edit data peserta dengan ID $id";
    }
    //PUT
    public function update(Request $request, $id)
    {
        $nama = $request->nama;
        $umur = $request->umur;
        $alamat = $request->alamat;
        return "Nama anda Adalah $nama, Umur anda $umur, Alamat anda $alamat";
    }
    //Delete
    public function delete(Request $request, $id)
    {
        $nama = $request->nama;
        $umur = $request->umur;
        $alamat = $request->alamat;
        return "Nama anda Adalah $nama, Umur anda $umur, Alamat anda $alamat";
    }
}
