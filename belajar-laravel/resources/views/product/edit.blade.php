@extends('app')
@section('konten') 
<div class="modern-card" style="max-width: 600px; margin: 0 auto;">
    <div class="d-flex align-items-center mb-4 border-bottom pb-3">
        <a href="{{ route('product.index') }}" class="btn btn-light btn-sm me-3" style="border-radius: 8px;">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h3 class="mb-0" style="font-weight: 600; color: #1e293b;">Edit Produk</h3>
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

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="category_id" class="form-label" style="font-weight: 500; color: #475569;">Nama Category <span class="text-danger">*</span></label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                <option value="">Pilih Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="name" class="form-label" style="font-weight: 500; color: #475569;">Nama Produk <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="Masukkan Nama Produk" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="form-label" style="font-weight: 500; color: #475569;">Price <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="Masukkan Harga" required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="photo" class="form-label" style="font-weight: 500; color: #475569;">Photo</label>
            @if ($product->photo)
                <div class="mb-2">
                    <img src="{{ asset('uploads/products/'.$product->photo) }}" alt="Photo" width="100" class="img-thumbnail">
                </div>
            @endif
            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="form-label" style="font-weight: 500; color: #475569;">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Masukkan Deskripsi" rows="3">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid mt-5">
            <button type="submit" class="btn-modern btn-primary">
                <i class="bi bi-save me-1"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
