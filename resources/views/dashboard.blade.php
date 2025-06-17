@include('partials.navbar')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
  <h3 class="mb-4">Laporan Transaksi</h3>

  <div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>User</th>
          <th>Produk</th>
          <th>Harga</th>
          <th>Qty</th>
          <th>Total</th>
          <th>Status</th>
          <th>Tanggal</th>
        </tr>
      </thead>
      <tbody>
        <!-- Loop Laravel (Blade) -->
        @php $no = 1; @endphp
        @foreach ($orders as $order)
          @foreach ($order->orderItems as $item)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $order->user->name ?? '-' }}</td>
              <td>{{ $item->product->name ?? 'Produk dihapus' }}</td>
              <td>Rp{{ number_format($item->price, 0, ',', '.') }}</td>
              <td>{{ $item->quantity }}</td>
              <td>Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
              <td>{{ ucfirst($order->status ?? '-') }}</td>
              <td>{{ $order->created_at->format('d M Y') }}</td>
            </tr>
          @endforeach
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Tombol kembali -->
  <div class="mt-3">
    <a href="{{ route('home') }}" class="btn btn-secondary">
      <i class="bi bi-arrow-left"></i> Kembali ke Beranda
    </a>
  </div>
</div>


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@include('partials.footer')