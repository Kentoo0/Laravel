<div class="col">
  <div class="card h-100">
    <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}" />
    <div class="card-body text-center">
      <h5 class="card-title">{{ $product->name }}</h5>
      <p class="card-text">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
      <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Beli Sekarang</a>
    </div>
  </div>
</div>
