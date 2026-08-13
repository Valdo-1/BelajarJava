@extends('app')
@section('konten')
<div class="modern-card stagger-1">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="page-title mb-0" style="font-weight: 700; color: #1e293b;">Data Produk</h2>
        <a href="{{ route('product.create') }}" class="btn-modern btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah produk
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
                    <th>Category Name</th>
                    <th>Nama Produk</th>
                    <th>Price</th>
                    <th>photo</th>
                    <th>Description</th>
                    <th class="text-center" style="width: 200px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                <tr>
                    <td class="text-center text-muted" style="font-size: 14px;">{{ $products->firstItem() + $index }}</td>
                    <td style="font-weight: 600; color: #0f172a;">{{ $product->category->name }}</td>
                    <td style="font-weight: 600; color: #1049ceff;">{{ $product->name }}</td>
                    <td style="font-weight: 600; color: #15ff3cff;">Rp. {{ $product->price }}</td>
                    <td class="text-center">
                        @if ($product->photo)
                            <img src="{{ asset('uploads/products/' . $product->photo) }}" alt="Photo" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                        @else
                            -
                        @endif
                    </td>
                    <td style="font-weight: 600; color: #ff6b15ff;">{{ $product->description }}</td>
                    <td class="text-center">
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('product.edit', $product->id) }}" class="btn-modern btn-secondary btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
                    <td colspan="5" class="text-center py-5 text-muted">Belum ada data product.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection