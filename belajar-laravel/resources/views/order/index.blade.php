@extends('app')
@section('konten')
<div class="modern-card stagger-1">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="page-title mb-0" style="font-weight: 700; color: #1e293b;">Data Order</h2>
        <a href="{{ route('order.create') }}" class="btn-modern btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Order
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="modern-table">
            <thead>
                <tr>
                    <th class="text-center" style="width: 60px;">No</th>
                    <th>Kode Order</th>
                    <th>Jumlah Order</th>
                    <th>Kembalian Order</th>
                    <th>Status</th>
                    <th class="text-center" style="width: 200px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $index => $order)
                <tr>
                    <td class="text-center text-muted" style="font-size: 14px;">{{ $orders->firstItem() + $index }}</td>
                    <td>{{ $order->order_code }}</td>
                    <td style="font-weight: 600; color: #0f172a;">Rp. {{ number_format($order->order_amount, 2) }}</td>
                    <td style="font-weight: 600; color: #15ff3cff;">Rp. {{ number_format($order->order_change, 2) }}</td>
                    <td class="text-center">
                        @if ($order->status == 1)
                            <span class="badge bg-success">Selesai</span>
                        @else
                            <span class="badge bg-danger">Pending</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('order.show', $order->id) }}" class="btn-modern btn-info btn-sm text-white">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                            <form action="{{ route('order.destroy', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
                    <td colspan="5" class="text-center py-5 text-muted">Belum ada data order.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $orders->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection