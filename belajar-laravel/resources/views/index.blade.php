@extends('app')
@section('konten')
<div class="ios-card stagger-1">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="page-title mb-0">Data Peserta</h2>
        <a href="{{ route('peserta.create') }}" class="btn-ios btn-ios-primary">
            <i class="bi bi-plus-lg"></i> Tambah Data
        </a>
    </div>

    <div class="table-responsive">
        <table class="ios-table">
            <thead>
                <tr>
                    <th class="text-center" style="width: 60px;">No</th>
                    <th>Nama</th>
                    <th class="text-center" style="width: 80px;">Umur</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th class="text-center" style="width: 200px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pesertas as $index => $value)
                <tr class="stagger-2" @style(['animation: slideUpFade 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards', 'opacity: 0', 'animation-delay: ' . (0.1 * ($index + 1)) . 's'])>
                    <td class="text-center text-muted">{{ $index + 1 }}</td>
                    <td style="font-weight: 500; color: var(--ios-text);">{{ $value->name }}</td>
                    <td class="text-center">{{ $value->age }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->address }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('peserta.edit', $value->id) }}" class="btn-ios btn-ios-secondary btn-ios-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <a href="{{ route('peserta.delete', $value->id) }}" class="btn-ios btn-ios-danger btn-ios-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="bi bi-trash"></i> Delete
                            </a>
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
</div>
@endsection