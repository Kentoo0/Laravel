<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite(['resources/js/app.js'])
  <title>{{ $product->name ?? 'Produk' }} | Essensea</title>
</head>
<body>
  @include('partials.navbar')

  <div class="container py-5">
    <div class="row g-5">
      <!-- Gambar Produk dan Tombol -->
      <div class="col-md-5 text-center">
        <img src="{{ asset($product->image ?? 'images/default.jpg') }}" alt="{{ $product->name }}" class="img-fluid rounded shadow" />
        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-4">
          @csrf
          <button type="submit" class="btn btn-primary w-100">
            <i class="bi bi-cart-plus me-2"></i> Add to Cart
          </button>
        </form>
      </div>

      <!-- Detail Produk -->
      <div class="col-md-7">
        <h2 class="fw-bold">{{ $product->name }}</h2>
        <h4 class="text-primary mb-2">Rp{{ number_format($product->price, 0, ',', '.') }}</h4>
        <h5 class="text-muted">{{ $product->aroma ?? '-' }}</h5>
        <p class="mt-3">{{ $product->description }}</p>
        <p><strong>Stok Tersedia:</strong> {{ $product->stock }}</p>

        <h5 class="mt-4 fw-semibold">Spesifikasi Produk</h5>
        <ul class="list-unstyled">            <li><strong>Volume:</strong> {{ $product->volume ?? '-' }} ml</li>
        <li><strong>Ketahanan aroma:</strong> {{ $product->longevity ?? '-' }}</li>
        <li><strong>Jenis:</strong> {{ $product->type ?? '-' }}</li>
        <li><strong>Target gender:</strong> {{ $product->gender ?? '-' }}</li>
    </ul>
      </div>
    </div>
  </div>

  @include('partials.footer')
</body>
</html>
