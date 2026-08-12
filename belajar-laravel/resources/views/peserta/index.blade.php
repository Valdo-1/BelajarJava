@extends('app')
@section('konten')
<div class="modern-card stagger-1">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="page-title mb-0" style="font-weight: 700; color: #1e293b;">Data Peserta</h2>
        <a href="{{ route('peserta.create') }}" class="btn-modern btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Data
        </a>
    </div>

    <div class="table-responsive">
        <table class="modern-table">
            <thead>
                <tr>
                    <th class="text-center" style="width: 60px;">No</th>
                    <th>Nama Lengkap</th>
                    <th class="text-center" style="width: 100px;">Umur</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th class="text-center" style="width: 200px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pesertas as $index => $value)
                <tr>
                    <td class="text-center text-muted" style="font-size: 14px;">{{ $pesertas->firstItem() + $index }}</td>
                    <td style="font-weight: 600; color: #0f172a;">{{ $value->name }}</td>
                    <td class="text-center">
                        <span class="badge-modern">{{ $value->age }} Tahun</span>
                    </td>
                    <td style="color: #64748b; font-size: 14px;">{{ $value->email }}</td>
                    <td style="color: #475569; font-size: 14px;">{{ $value->address }}</td>
                    <td class="text-center">
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('peserta.edit', $value->id) }}" class="btn-modern btn-secondary btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('peserta.destroy', $value->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
                    <td colspan="6" class="text-center py-5 text-muted">Belum ada data peserta.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $pesertas->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection