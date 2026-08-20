@extends('app')
@section('konten')
<div class="modern-card stagger-1">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="page-title mb-0" style="font-weight: 700; color: #1e293b;">Detail Order</h2>
        <a href="{{ route('order.index') }}" class="btn-modern btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <table class="table table-borderless">
                <tr>
                    <th width="150">Kode Order</th>
                    <td width="20">:</td>
                    <td><strong class="text-primary">{{ $order->order_code }}</strong></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>:</td>
                    <td>
                        @if ($order->status == 1)
                            <span class="badge bg-success">Selesai</span>
                        @else
                            <span class="badge bg-danger">Pending</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Tanggal Order</th>
                    <td>:</td>
                    <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-borderless">
                <tr>
                    <th width="150">Total Belanja</th>
                    <td width="20">:</td>
                    <td><strong class="text-dark">Rp {{ number_format($order->order_amount, 2) }}</strong></td>
                </tr>
                <tr>
                    <th>Pembayaran</th>
                    <td>:</td>
                    <td><strong class="text-success">Rp {{ number_format($order->order_amount + $order->order_change, 2) }}</strong></td>
                </tr>
                <tr>
                    <th>Kembalian</th>
                    <td>:</td>
                    <td><strong class="text-info">Rp {{ number_format($order->order_change, 2) }}</strong></td>
                </tr>
            </table>
        </div>
    </div>

    <h5 class="fw-bold mb-3 border-bottom pb-2">Daftar Produk</h5>
    <div class="table-responsive">
        <table class="modern-table table table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 60px;">No</th>
                    <th>Nama Produk</th>
                    <th class="text-center">Harga Satuan</th>
                    <th class="text-center">Qty</th>
                    <th class="text-end">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($order->order_details as $index => $detail)
                <tr>
                    <td class="text-center text-muted">{{ $index + 1 }}</td>
                    <td class="fw-bold">{{ $detail->product ? $detail->product->name : 'Produk Dihapus' }}</td>
                    <td class="text-center">Rp {{ number_format($detail->price, 2) }}</td>
                    <td class="text-center">{{ $detail->quantity }}</td>
                    <td class="text-end fw-bold text-dark">Rp {{ number_format($detail->total_price, 2) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">Tidak ada rincian produk untuk pesanan ini.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
