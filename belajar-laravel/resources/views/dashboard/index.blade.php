@extends('app')
@section('konten')
<div class="modern-card stagger-1">
    <div class="mb-4">
        <h2 class="page-title mb-1" style="font-weight: 700; color: #1e293b;">Dashboard Overview</h2>
        <p class="text-muted">Ringkasan statistik aplikasi Anda.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-4 col-sm-6">
            <div class="card bg-primary text-white h-100 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-people" style="font-size: 2.5rem;"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Total Peserta</h5>
                        <h3 class="mb-0 fw-bold">{{ $totalPeserta }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card bg-success text-white h-100 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-person-badge" style="font-size: 2.5rem;"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Total Role</h5>
                        <h3 class="mb-0 fw-bold">{{ $totalRole }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card bg-info text-white h-100 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-tags" style="font-size: 2.5rem;"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Total Category</h5>
                        <h3 class="mb-0 fw-bold">{{ $totalCategory }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card bg-warning text-white h-100 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-box-seam" style="font-size: 2.5rem;"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Total Produk</h5>
                        <h3 class="mb-0 fw-bold">{{ $totalProduk }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card bg-danger text-white h-100 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-cart-check" style="font-size: 2.5rem;"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Total Pesanan</h5>
                        <h3 class="mb-0 fw-bold">{{ $totalPesanan }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection