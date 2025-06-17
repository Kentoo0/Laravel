
<div class="container">
    <h2>Rincian Transaksi</h2>

    <p><strong>Tanggal:</strong> {{ $order->created_at->format('d-m-Y H:i') }}</p>
    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="text-end">Total Bayar</th>
                <th>Rp{{ number_format($order->total, 0, ',', '.') }}</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
