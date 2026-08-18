@extends('app')
@section('konten') 
<div class="modern-card" style="max-width: 600px; margin: 0 auto;">
    <div class="d-flex align-items-center mb-4 border-bottom pb-3">
        <a href="{{ route('order.index') }}" class="btn btn-light btn-sm me-3" style="border-radius: 8px;">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h3 class="mb-0" style="font-weight: 600; color: #1e293b;">Tambah Data Order</h3>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="order_code" class="form-label" style="font-weight: 500; color: #475569;">Kode Order <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('order_code') is-invalid @enderror" id="order_code" name="order_code" value="{{ old('order_code') }}" placeholder="Masukkan Kode Order" required>
            @error('order_code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="order_amount" class="form-label" style="font-weight: 500; color: #475569;">Jumlah Order <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('order_amount') is-invalid @enderror" id="order_amount" name="order_amount" value="{{ old('order_amount') }}" placeholder="Masukkan Jumlah Order" required>
            @error('order_amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="order_change" class="form-label" style="font-weight: 500; color: #475569;">Kembalian Order <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('order_change') is-invalid @enderror" id="order_change" name="order_change" value="{{ old('order_change') }}" placeholder="Masukkan Kembalian Order" required>
            @error('order_change')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="status" class="form-label" style="font-weight: 500; color: #475569;">Status <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status') }}" placeholder="Masukkan Status" required>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid mt-5">
            <button type="submit" class="btn-modern btn-primary">
                <i class="bi bi-save me-1"></i> Simpan Order
            </button>
        </div>
    </form>
</div>
@endsection