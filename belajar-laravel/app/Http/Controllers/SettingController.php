<?php

namespace App\Http\Controllers;
use App\Models\Setting;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        
        // Jika belum ada data di database, buat data default
        if (!$setting) {
            $setting = Setting::create([
                'site_name' => 'My Website',
                'site_description' => 'Ini adalah deskripsi website saya',
                'copyright' => '© 2026 My Website'
            ]);
        }

        return view('setting.index', compact('setting'));
    }

public function update(Request $request, string $id)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'required|string|max:255',
            'copyright' => 'required|string|max:255',
        ]);
        
        $setting = Setting::findOrFail($id);
        $setting->update($request->all());

        return redirect()->route('setting.index')->with('success', 'Data setting berhasil diubah');
    }

public function edit($id)
{
    $setting = Setting::find($id);
    return view('setting.edit', compact('setting'));
}
}
