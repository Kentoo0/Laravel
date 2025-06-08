<div class="col">
  <div class="card h-100">
    <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}" />
    <div class="card-body text-center">
      <h5 class="card-title">{{ $product->name }}</h5>
      <p class="card-text">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
       <form action="{{ route('cart.add', $product->id) }}" method="POST">
  @csrf
  <button type="submit" class="btn btn-primary">Beli Sekarang</button>
</form>
    </div>
  </div>
</div>
