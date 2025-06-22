@include('partials.navbar')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="card mt-4">
  <div class="card-header">
    <h5>Riwayat Transaksi</h5>
  </div>
  <div class="card-body">
    @if ($orders->isEmpty())
        <p class="text-muted">Belum ada transaksi.</p>
    @else
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Produk</th>
              <th>Total</th>
              <th>Status</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $index => $order)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                  @foreach ($order->orderItems as $item)
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
      </div>
    @endif
  </div>
</div>


<div class="mt-4">
    <a href="{{ route('home') }}" class="btn btn-secondary">
        <i class="bi bi-house"></i> Kembali ke Beranda
    </a>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@include('partials.footer')
