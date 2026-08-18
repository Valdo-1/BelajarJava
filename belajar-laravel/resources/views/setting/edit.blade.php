@extends('app')
@section('konten') 
<div class="modern-card" style="max-width: 600px; margin: 0 auto;">
    <div class="d-flex align-items-center mb-4 border-bottom pb-3">
        <a href="{{ route('setting.index') }}" class="btn-modern btn-secondary btn-sm me-3" style="border-radius: 50%; width: 36px; height: 36px; padding: 0;">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h2 class="page-title mb-0" style="font-weight: 700; color: #1e293b; font-size: 20px;">Edit Setting</h2>
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

    <form action="{{ route('setting.update', $setting->id) }}" method="post">
        @csrf
        @method('PUT')
       
        <div class="mb-4">
            <label for="site_name" class="modern-label">Nama Website</label>
            <input type="text" class="modern-input" id="site_name" name="site_name" value="{{ old('site_name', $setting->site_name) }}" placeholder="Masukkan nama website" required>
        </div>
        <div class="mb-4">
            <label for="site_description" class="modern-label">Deskripsi</label>
            <input type="text" class="modern-input" id="site_description" name="site_description" value="{{ old('site_description', $setting->site_description) }}" placeholder="Masukkan deskripsi" required>
        </div>
        <div class="mb-4">
            <label for="copyright" class="modern-label">Copyright</label>
            <input type="text" class="modern-input" id="copyright" name="copyright" value="{{ old('copyright', $setting->copyright) }}" placeholder="Masukkan copyright" required>
        </div>
        <div class="mt-5 pt-3 border-top d-flex justify-content-end">
            <button type="submit" class="btn-modern btn-primary px-5" style="width: 100%;">
                <i class="bi bi-check2-circle me-1" style="font-size: 18px;"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection 