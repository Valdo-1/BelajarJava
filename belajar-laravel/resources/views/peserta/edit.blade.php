@extends('app')
@section('konten') 
<div class="modern-card" style="max-width: 600px; margin: 0 auto;">
    <div class="d-flex align-items-center mb-4 border-bottom pb-3">
        <a href="{{ route('peserta.index') }}" class="btn-modern btn-secondary btn-sm me-3" style="border-radius: 50%; width: 36px; height: 36px; padding: 0;">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h2 class="page-title mb-0" style="font-weight: 700; color: #1e293b; font-size: 20px;">Edit Data Peserta</h2>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger" style="margin-bottom: 24px; border-radius: 12px; border: none; background: #fef2f2; color: #991b1b; padding: 16px;">
            <div class="d-flex align-items-center mb-2" style="font-weight: 600;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> Terdapat kesalahan input:
            </div>
            <ul style="margin: 0; padding-left: 24px; font-size: 14px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('peserta.update', $peserta->id) }}" method="post">
        @csrf
        @method('PUT')
       
        <div class="mb-4">
            <label for="name" class="modern-label">Nama Lengkap</label>
            <input type="text" class="modern-input" id="name" name="name" value="{{ old('name', $peserta->name) }}" placeholder="Masukkan nama" required>
        </div>
        <div class="mb-4">
            <label for="email" class="modern-label">Email</label>
            <input type="email" class="modern-input" id="email" name="email" value="{{ old('email', $peserta->email) }}" placeholder="Masukkan email" required>
        </div>
        <div class="mb-4">
            <label for="age" class="modern-label">Umur</label>
            <input type="number" class="modern-input" id="age" name="age" value="{{ old('age', $peserta->age) }}" placeholder="Masukkan umur" min="18" max="65" required>
        </div>
        <div class="mb-4">
            <label for="address" class="modern-label">Alamat</label>
            <input type="text" class="modern-input" id="address" name="address" value="{{ old('address', $peserta->address) }}" placeholder="Masukkan alamat lengkap" required>
        </div>
        
        <div class="mt-5 pt-3 border-top d-flex justify-content-end">
            <button type="submit" class="btn-modern btn-primary px-5" style="width: 100%;">
                <i class="bi bi-check2-circle me-1" style="font-size: 18px;"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection 