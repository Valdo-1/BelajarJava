@extends('app')
@section('konten')
<div class="modern-card stagger-1">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="page-title mb-0" style="font-weight: 700; color: #1e293b;">Data Category</h2>
        <a href="{{ route('category.create') }}" class="btn-modern btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Category
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="modern-table">
            <thead>
                <tr>
                    <th class="text-center" style="width: 60px;">No</th>
                    <th>Nama Category</th>
                    <th class="text-center" style="width: 150px;">Status</th>
                    <th class="text-center" style="width: 200px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $index => $category)
                <tr>
                    <td class="text-center text-muted" style="font-size: 14px;">{{ $categories->firstItem() + $index }}</td>
                    <td style="font-weight: 600; color: #0f172a;">{{ $category->name }}</td>
                    <td class="text-center">
                        @if ($category->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('category.edit', $category->id) }}" class="btn-modern btn-secondary btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-modern btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5 text-muted">Belum ada data category.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection