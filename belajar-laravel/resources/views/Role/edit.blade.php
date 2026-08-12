@extends('app')
@section('konten') 
<div class="modern-card" style="max-width: 600px; margin: 0 auto;">
    <div class="d-flex align-items-center mb-4 border-bottom pb-3">
        <a href="{{ route('role.index') }}" class="btn btn-light btn-sm me-3" style="border-radius: 8px;">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h3 class="mb-0" style="font-weight: 600; color: #1e293b;">Edit Role</h3>
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

    <form action="{{ route('role.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="name" class="form-label" style="font-weight: 500; color: #475569;">Nama Role <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $role->name) }}" placeholder="Masukkan nama role" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label d-block" style="font-weight: 500; color: #475569;">Status <span class="text-danger">*</span></label>
            <div class="form-check form-check-inline">
                <input class="form-check-input @error('is_active') is-invalid @enderror" type="radio" name="is_active" id="is_active_1" value="1" {{ old('is_active', $role->is_active) == 1 ? 'checked' : '' }} required>
                <label class="form-check-label" for="is_active_1">Aktif</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input @error('is_active') is-invalid @enderror" type="radio" name="is_active" id="is_active_0" value="0" {{ old('is_active', $role->is_active) == 0 ? 'checked' : '' }} required>
                <label class="form-check-label" for="is_active_0">Tidak Aktif</label>
            </div>
            @error('is_active')
                <div class="d-block invalid-feedback">{{ $message }}</div>
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
