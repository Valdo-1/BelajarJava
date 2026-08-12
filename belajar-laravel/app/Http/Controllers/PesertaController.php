<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;

class PesertaController extends Controller
{
    public function index()
    {
        $pesertas = Peserta::paginate(10);
        return view('peserta.index', compact('pesertas'));
    }
    public function create()
    {
        return view('peserta.create');
    }
    //Post
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:pesertas,email',
            'age' => 'required|numeric|min:18|max:65',
            'address' => 'nullable|max:100',
        ]);

        Peserta::create($request->all());

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil ditambahkan');
    }
    //GET
    public function show($id)
    {
        $peserta = Peserta::findOrFail($id);
        return response()->json($peserta);
    }
    //GET Edit
    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('peserta.edit', compact('peserta'));
    }
    //PUT
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:pesertas,email,'.$id,
            'age' => 'required|numeric|min:18|max:65',
            'address' => 'nullable|max:100',
        ]);

        $peserta = Peserta::findOrFail($id);
        $peserta->update($request->all());

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil diubah');
    }
    //Delete
    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil dihapus');
    }
}
