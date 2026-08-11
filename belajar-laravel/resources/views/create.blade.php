@extends('app') 
@section('konten') 
<div class="ios-card stagger-1" style="max-width: 600px; margin: 0 auto;">
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('peserta.index') }}" class="btn-ios btn-ios-secondary btn-ios-sm me-3" style="padding: 8px 12px; border-radius: 50%;">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h2 class="page-title mb-0">Tambah Data Peserta</h2>
    </div>

    <form action="{{ route('peserta.store') }}" method="post" class="stagger-2">
        @csrf
        <div class="mb-4">
            <label for="nama" class="ios-form-label">Nama Lengkap</label>
            <input type="text" class="ios-form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
        </div>
        <div class="mb-4">
            <label for="umur" class="ios-form-label">Umur</label>
            <input type="number" class="ios-form-control" id="umur" name="umur" placeholder="Masukkan umur" required>
        </div>
        <div class="mb-4">
            <label for="alamat" class="ios-form-label">Alamat</label>
            <input type="text" class="ios-form-control" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap" required>
        </div>
        
        <div class="mt-5 d-flex justify-content-end">
            <button type="submit" class="btn-ios btn-ios-primary px-5" style="width: 100%; justify-content: center;">
                <i class="bi bi-check2-circle me-1"></i> Simpan Data
            </button>
        </div>
    </form>
</div>
@endsection 