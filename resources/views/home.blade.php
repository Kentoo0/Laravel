<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Essensea</title>

  @vite(['resources/js/app.js'])

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>

  {{-- Navbar --}}
  @include('partials.navbar')

  {{-- Carousel --}}
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="{{ asset('images/slide1.png') }}" class="d-block w-100" alt="Essensea Slide 1" style="height: 450px; object-fit: cover;">
        <div class="carousel-caption d-none d-sm-block">
        </div>
      </div>

      <div class="carousel-item" data-bs-interval="5000">
        <img src="{{ asset('images/slide2.png') }}" class="d-block w-100" alt="Essensea Slide 2" style="height: 450px; object-fit: cover;">
        <div class="carousel-caption d-none d-sm-block">
        </div>
      </div>

      <div class="carousel-item">
        <img src="{{ asset('images/slide3.png') }}" class="d-block w-100" alt="Essensea Slide 3" style="height: 450px; object-fit: cover;">
        <div class="carousel-caption d-none d-sm-block">
        </div>
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Sebelumnya</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Berikutnya</span>
    </button>
  </div>

  {{-- Rekomendasi Produk --}}
  <div class="container my-5">
    <h2 class="mb-4">Our Recommendation</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
      @foreach($recommendProducts as $product)
        @include('partials.product_card', ['product' => $product])
      @endforeach
    </div>
  </div>

  {{-- Semua Produk --}}
  <div class="container my-5">
    <h2 class="mb-4">Our Products</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
      @foreach($maleProducts as $product)
        @include('partials.product_card', ['product' => $product])
      @endforeach

      @foreach($femaleProducts as $product)
        @include('partials.product_card', ['product' => $product])
      @endforeach

      @foreach($unisexProducts as $product)
        @include('partials.product_card', ['product' => $product])
      @endforeach
    </div>
  </div>

  {{-- Footer --}}
  @include('partials.footer')

</body>
</html>
