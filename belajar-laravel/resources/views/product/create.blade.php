@extends('app')
@section('konten') 
<div class="modern-card" style="max-width: 600px; margin: 0 auto;">
    <div class="d-flex align-items-center mb-4 border-bottom pb-3">
        <a href="{{ route('product.index') }}" class="btn btn-light btn-sm me-3" style="border-radius: 8px;">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h3 class="mb-0" style="font-weight: 600; color: #1e293b;">Tambah Produk Baru</h3>
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

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="category_id" class="form-label" style="font-weight: 500; color: #475569;">Nama Category <span class="text-danger">*</span></label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                <option value="">Pilih Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="name" class="form-label" >Nama Produk</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Produk" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="price" class="form-label" >Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" placeholder="Masukkan Harga" required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="photo" class="form-label" >Photo</label>
            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" value="{{ old('photo') }}" placeholder="Masukkan photo" required>
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="form-label" >Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Masukkan Deskripsi" rows="3">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="d-grid mt-5">
            <button type="submit" class="btn-modern btn-primary">
                <i class="bi bi-save me-1"></i> Simpan product
            </button>
        </div>
    </form>
</div>
@endsection
