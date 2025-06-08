<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite(['resources/js/app.js'])
  <title>{{ $category }} | Essensea</title>
</head>
<body>
  @include('partials.navbar')

  <div class="container my-4">
    <h2 class="mb-4">{{ $category }}</h2>
    <div class="p-4 mb-5 bg-light rounded-3 shadow-sm">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        @forelse ($products as $product)
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
        @empty
        <div class="col">
          <p>No products available in this category.</p>
        </div>
        @endforelse
      </div>
    </div>
  </div>

  @include('partials.footer')
</body>
</html>
