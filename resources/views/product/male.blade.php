<div class="p-4 mb-5 bg-light rounded-3 shadow-sm">
  <section id="male">
    <h2 class="text-left mb-4">Male</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
      @foreach ($maleProducts as $product)
      <div class="col">
        <div class="card h-100">
          <img src="{{ asset($product->image) }}" class="card-img-top" alt="Product Image" />
          <div class="card-body text-center">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
            <a href="#" class="btn btn-primary">Beli Sekarang</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>
</div>
