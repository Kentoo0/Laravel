<div class="p-4 mb-5 bg-light rounded-3 shadow-sm">
  <section id="female">
    <h2 class="text-left mb-4">Female</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
      @foreach ($femaleProducts as $product)
      <div class="col">
        <div class="card h-100">
          <img src="{{ asset($product->image) }}" class="card-img-top" alt="Product Image" />
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
      @endforeach
    </div>
  </section>
</div>
