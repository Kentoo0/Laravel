@extends('layouts.app')

@section('content')
@include('partials.navbar')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Dashboard Admin</h2>
       <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
    Tambah Produk
</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama User</th>
                <th>Produk</th>
                <th>Total</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $index => $order)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $order->user->name ?? '-' }}</td>
                    <td>
                        @foreach ($order->orderItems as $item)
                            {{ $item->product->name ?? '-' }} x{{ $item->quantity }}<br>
                        @endforeach
                    </td>
                    <td>Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                    <td>
                        <span class="badge 
                            {{ $order->status === 'success' ? 'bg-success' : 
                               ($order->status === 'pending' ? 'bg-warning text-dark' : 
                               ($order->status === 'cancelled' ? 'bg-danger' : 'bg-secondary')) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada transaksi</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


@endsection
