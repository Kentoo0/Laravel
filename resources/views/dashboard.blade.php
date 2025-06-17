@include('partials.navbar')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- dashboard.blade.php -->
<h4 class="mt-5">Laporan Transaksi</h4>
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
        @foreach($orders as $index => $order)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $order->user->name ?? '-' }}</td>
                <td>
                    @foreach($order->orderItems as $item)
                        {{ $item->product->name ?? '-' }} x{{ $item->quantity }}<br>
                    @endforeach
                </td>
                <td>Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>{{ $order->created_at->format('d M Y H:i') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>



<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@include('partials.footer')