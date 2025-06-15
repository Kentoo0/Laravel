<div class="col">
  <div class="card h-100">
    <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}" />
    <div class="card-body text-center">
      <h5 class="card-title">{{ $product->name }}</h5>
      <p class="card-text">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
       <form action="{{ route('cart.add', $product->id) }}" method="POST">
  @csrf
  <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-primary">Lihat Detail</a>
</form>
    </div>
  </div>
</div>
