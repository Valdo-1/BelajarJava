@extends('app')
@section('konten')

<!-- Header Settings -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
    <div>
        <h2 class="page-title mb-1" style="font-weight: 700; color: #1e293b;">
            <i class="bi bi-gear-fill text-primary me-2"></i>Settings
        </h2>
        <p class="text-muted mb-0" style="font-size: 15px;">Kelola informasi dan konfigurasi website Anda.</p>
    </div>
    
    @if($setting)
    <div class="mt-3 mt-md-0">
        <a href="{{ route('setting.edit', $setting->id) }}" class="btn btn-primary px-4 shadow-sm" style="border-radius: 8px; font-weight: 500;">
            <i class="bi bi-pencil-square me-2"></i>Edit Settings
        </a>
    </div>
    @endif
</div>

<!-- Success Notification -->
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show shadow-sm border-0 d-flex align-items-center" role="alert" style="border-radius: 10px; background-color: #d1e7dd; color: #0f5132;">
    <i class="bi bi-check-circle-fill fs-5 me-3"></i>
    <div>
        <strong>Berhasil!</strong> {{ session('success') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($setting)
<!-- Settings Information Card -->
<div class="card border-0 shadow-sm mb-5" style="border-radius: 16px; overflow: hidden;">
    <div class="card-header bg-white border-bottom pt-4 pb-3 px-4 px-md-5 d-flex align-items-center">
        <i class="bi bi-info-circle text-primary me-2 fs-5"></i>
        <h5 class="mb-0" style="font-weight: 600; color: #334155;">Informasi Website</h5>
    </div>
    
    <div class="card-body p-4 p-md-5">
        <div class="row g-4 mb-4">
            <!-- Nama Website -->
            <div class="col-md-6">
                <div class="d-flex align-items-start">
                    <div class="bg-primary bg-opacity-10 rounded d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px;">
                        <i class="bi bi-globe2 text-primary fs-4"></i>
                    </div>
                    <div>
                        <small class="text-muted text-uppercase fw-bold" style="letter-spacing: 0.5px; font-size: 12px;">Nama Website</small>
                        <h6 class="mt-1 mb-0 fs-5" style="color: #0f172a; font-weight: 600;">{{ $setting->site_name }}</h6>
                    </div>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="col-md-6">
                <div class="d-flex align-items-start">
                    <div class="bg-primary bg-opacity-10 rounded d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px;">
                        <i class="bi bi-c-circle text-primary fs-4"></i>
                    </div>
                    <div>
                        <small class="text-muted text-uppercase fw-bold" style="letter-spacing: 0.5px; font-size: 12px;">Copyright</small>
                        <h6 class="mt-1 mb-0 fs-5" style="color: #0f172a; font-weight: 600;">{{ $setting->copyright }}</h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deskripsi Website -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-start mt-3">
                    <div class="bg-primary bg-opacity-10 rounded d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px; flex-shrink: 0;">
                        <i class="bi bi-card-text text-primary fs-4"></i>
                    </div>
                    <div class="w-100">
                        <small class="text-muted text-uppercase fw-bold" style="letter-spacing: 0.5px; font-size: 12px;">Deskripsi Website</small>
                        <div class="mt-2 p-3 bg-light rounded" style="color: #475569; font-size: 15px; line-height: 1.6; border: 1px solid #f1f5f9;">
                            {{ $setting->site_description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<!-- Empty State -->
<div class="card border-0 shadow-sm text-center py-5" style="border-radius: 16px;">
    <div class="card-body py-5">
        <div class="mb-4">
            <div class="d-inline-flex align-items-center justify-content-center bg-light rounded-circle text-muted" style="width: 100px; height: 100px;">
                <i class="bi bi-gear-wide-connected" style="font-size: 48px;"></i>
            </div>
        </div>
        <h4 style="font-weight: 700; color: #1e293b; margin-bottom: 12px;">Data Settings Belum Tersedia</h4>
        <p class="text-muted mx-auto mb-0" style="max-width: 400px; font-size: 15px;">
            Sistem mendeteksi bahwa informasi pengaturan website belum ditambahkan. Harap hubungi administrator database atau pastikan fitur auto-create berjalan.
        </p>
    </div>
</div>
@endif

@endsection